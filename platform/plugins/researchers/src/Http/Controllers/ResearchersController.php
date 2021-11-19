<?php

namespace Botble\Researchers\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Researchers\Http\Requests\ResearchersRequest;
use Botble\Researchers\Repositories\Interfaces\ResearchersInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Researchers\Tables\ResearchersTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Researchers\Forms\ResearchersForm;
use Botble\Base\Forms\FormBuilder;

class ResearchersController extends BaseController
{
    /**
     * @var ResearchersInterface
     */
    protected $researchersRepository;

    /**
     * @param ResearchersInterface $researchersRepository
     */
    public function __construct(ResearchersInterface $researchersRepository)
    {
        $this->researchersRepository = $researchersRepository;
    }

    /**
     * @param ResearchersTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ResearchersTable $table)
    {
        page_title()->setTitle(trans('plugins/researchers::researchers.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/researchers::researchers.create'));

        return $formBuilder->create(ResearchersForm::class)->renderForm();
    }

    /**
     * @param ResearchersRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(ResearchersRequest $request, BaseHttpResponse $response)
    {
        $researchers = $this->researchersRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(RESEARCHERS_MODULE_SCREEN_NAME, $request, $researchers));

        return $response
            ->setPreviousUrl(route('researchers.index'))
            ->setNextUrl(route('researchers.edit', $researchers->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $researchers = $this->researchersRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $researchers));

        page_title()->setTitle(trans('plugins/researchers::researchers.edit') . ' "' . $researchers->name . '"');

        return $formBuilder->create(ResearchersForm::class, ['model' => $researchers])->renderForm();
    }

    /**
     * @param $id
     * @param ResearchersRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, ResearchersRequest $request, BaseHttpResponse $response)
    {
        $researchers = $this->researchersRepository->findOrFail($id);

        $researchers->fill($request->input());

        $this->researchersRepository->createOrUpdate($researchers);

        event(new UpdatedContentEvent(RESEARCHERS_MODULE_SCREEN_NAME, $request, $researchers));

        return $response
            ->setPreviousUrl(route('researchers.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $researchers = $this->researchersRepository->findOrFail($id);

            $this->researchersRepository->delete($researchers);

            event(new DeletedContentEvent(RESEARCHERS_MODULE_SCREEN_NAME, $request, $researchers));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $researchers = $this->researchersRepository->findOrFail($id);
            $this->researchersRepository->delete($researchers);
            event(new DeletedContentEvent(RESEARCHERS_MODULE_SCREEN_NAME, $request, $researchers));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
