<?php

namespace Botble\Circuit\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Circuit\Http\Requests\CircuitRequest;
use Botble\Circuit\Repositories\Interfaces\CircuitInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Circuit\Tables\CircuitTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Circuit\Forms\CircuitForm;
use Botble\Base\Forms\FormBuilder;

class CircuitController extends BaseController
{
    /**
     * @var CircuitInterface
     */
    protected $circuitRepository;

    /**
     * @param CircuitInterface $circuitRepository
     */
    public function __construct(CircuitInterface $circuitRepository)
    {
        $this->circuitRepository = $circuitRepository;
    }

    /**
     * @param CircuitTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(CircuitTable $table)
    {
        page_title()->setTitle(trans('plugins/circuit::circuit.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/circuit::circuit.create'));

        return $formBuilder->create(CircuitForm::class)->renderForm();
    }

    /**
     * @param CircuitRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(CircuitRequest $request, BaseHttpResponse $response)
    {
        $circuit = $this->circuitRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(CIRCUIT_MODULE_SCREEN_NAME, $request, $circuit));

        return $response
            ->setPreviousUrl(route('circuit.index'))
            ->setNextUrl(route('circuit.edit', $circuit->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $circuit = $this->circuitRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $circuit));

        page_title()->setTitle(trans('plugins/circuit::circuit.edit') . ' "' . $circuit->name . '"');

        return $formBuilder->create(CircuitForm::class, ['model' => $circuit])->renderForm();
    }

    /**
     * @param int $id
     * @param CircuitRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, CircuitRequest $request, BaseHttpResponse $response)
    {
        $circuit = $this->circuitRepository->findOrFail($id);

        $circuit->fill($request->input());

        $this->circuitRepository->createOrUpdate($circuit);

        event(new UpdatedContentEvent(CIRCUIT_MODULE_SCREEN_NAME, $request, $circuit));

        return $response
            ->setPreviousUrl(route('circuit.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $circuit = $this->circuitRepository->findOrFail($id);

            $this->circuitRepository->delete($circuit);

            event(new DeletedContentEvent(CIRCUIT_MODULE_SCREEN_NAME, $request, $circuit));

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
            $circuit = $this->circuitRepository->findOrFail($id);
            $this->circuitRepository->delete($circuit);
            event(new DeletedContentEvent(CIRCUIT_MODULE_SCREEN_NAME, $request, $circuit));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
