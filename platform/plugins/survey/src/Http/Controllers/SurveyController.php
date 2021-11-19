<?php

namespace Botble\Survey\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Survey\Http\Requests\SurveyRequest;
use Botble\Survey\Models\Survey;
use Botble\Survey\Models\SurveyResult;
use Botble\Survey\Repositories\Interfaces\SurveyInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Survey\Tables\SurveyTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Survey\Forms\SurveyForm;
use Botble\Base\Forms\FormBuilder;

class SurveyController extends BaseController
{
    /**
     * @var SurveyInterface
     */
    protected $surveyRepository;

    /**
     * @param SurveyInterface $surveyRepository
     */
    public function __construct(SurveyInterface $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    /**
     * @param SurveyTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(SurveyTable $table)
    {
        page_title()->setTitle(trans('plugins/survey::survey.name'));

        return $table->renderTable();
    }

    public function surveyResults($id,Request $request, BaseHttpResponse $response)
    {
        $survey=Survey::where(['id'=>$id])->first();
        $results=SurveyResult::where(['survey_id'=>$id])->get();
        return view('plugins/survey::survey-results', [
            'results' => $results,
            'survey' =>$survey
        ]);
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/survey::survey.create'));

        return $formBuilder->create(SurveyForm::class)->renderForm();
    }

    /**
     * @param SurveyRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(SurveyRequest $request, BaseHttpResponse $response)
    {
        $survey = $this->surveyRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(SURVEY_MODULE_SCREEN_NAME, $request, $survey));

        return $response
            ->setPreviousUrl(route('survey.index'))
            ->setNextUrl(route('survey.edit', $survey->id))
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
        $survey = $this->surveyRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $survey));

        page_title()->setTitle(trans('plugins/survey::survey.edit') . ' "' . $survey->name . '"');

        return $formBuilder->create(SurveyForm::class, ['model' => $survey])->renderForm();
    }

    /**
     * @param int $id
     * @param SurveyRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, SurveyRequest $request, BaseHttpResponse $response)
    {
        $survey = $this->surveyRepository->findOrFail($id);

        $survey->fill($request->input());

        $survey = $this->surveyRepository->createOrUpdate($survey);

        event(new UpdatedContentEvent(SURVEY_MODULE_SCREEN_NAME, $request, $survey));

        return $response
            ->setPreviousUrl(route('survey.index'))
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
            $survey = $this->surveyRepository->findOrFail($id);

            $this->surveyRepository->delete($survey);

            event(new DeletedContentEvent(SURVEY_MODULE_SCREEN_NAME, $request, $survey));

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
            $survey = $this->surveyRepository->findOrFail($id);
            $this->surveyRepository->delete($survey);
            event(new DeletedContentEvent(SURVEY_MODULE_SCREEN_NAME, $request, $survey));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
