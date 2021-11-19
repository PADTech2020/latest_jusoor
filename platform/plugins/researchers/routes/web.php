<?php

Route::group(['namespace' => 'Botble\Researchers\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'researchers', 'as' => 'researchers.'], function () {
            Route::resource('', 'ResearchersController')->parameters(['' => 'researchers']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ResearchersController@deletes',
                'permission' => 'researchers.destroy',
            ]);
        });
    });

});
