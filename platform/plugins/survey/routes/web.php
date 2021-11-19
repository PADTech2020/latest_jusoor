<?php
Route::group([
    'middleware' => 'api',
    'prefix' => 'api/v2',
    'namespace' => 'Botble\Survey\Http\Controllers\API',
], function () {


    Route::post('submit-survey', 'SurveyAPIController@submitSurvey');
});
Route::group(['namespace' => 'Botble\Survey\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {


        Route::group(['prefix' => 'surveys', 'as' => 'survey.'], function () {
            Route::resource('', 'SurveyController')->parameters(['' => 'survey']);

            Route::get('/survey-results/{id?}', [
                'as' => 'survey-results',
                'uses' => 'SurveyController@surveyResults',
                'permission' => 'survey.survey-results',
            ]);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'SurveyController@deletes',
                'permission' => 'survey.destroy',
            ]);
        });
    });

});
