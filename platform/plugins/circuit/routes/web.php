<?php

Route::group(['namespace' => 'Botble\Circuit\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'circuits', 'as' => 'circuit.'], function () {
            Route::resource('', 'CircuitController')->parameters(['' => 'circuit']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CircuitController@deletes',
                'permission' => 'circuit.destroy',
            ]);
        });
    });

});
