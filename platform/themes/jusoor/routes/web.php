<?php

// Custom routes
// You can delete this route group if you don't need to add your custom routes.
Route::group(['namespace' => 'Theme\Jusoor\Http\Controllers', 'middleware' => 'web'], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        // Add your custom route here
        // Ex: Route::get('hello', 'JusoorController@getHello');
        Route::get('/', [
            'as'   => 'public.index',
            'uses' => 'JusoorController@home2',
        ]);
        Route::get('/home2', [
            'as'   => 'public.index',
            'uses' => 'JusoorController@getIndex',
        ]);

        Route::get('/about-us', [
            'as'   => 'public.about',
            'uses' => 'JusoorController@aboutPage',
        ]);
        
        Route::get('/getSiteMap', [
            'as'   => 'public.getSiteMap',
            'uses' => 'JusoorController@getSiteMap',
        ]);

        Route::get('/researchers-list', [
            'as'   => 'public.researchers',
            'uses' => 'JusoorController@researchersPage',
        ]);
        Route::get('/researchers/{id}', [
            'as'   => 'public.about',
            'uses' => 'JusoorController@researcherPage',
        ]);
        Route::get('/articles/{id}', [
            'as'   => 'public.about',
            'uses' => 'JusoorController@postsForResearchers',
        ]);

//        Route::get('/', 'JusoorController@home2')
//            ->name('public.index');
        Route::get('/contact-us', [
            'as'   => 'public.index',
            'uses' => 'JusoorController@contact',
        ]);
    });

});

Theme::routes();

Route::group(['namespace' => 'Theme\Jusoor\Http\Controllers', 'middleware' => 'web'], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

//        Route::get('/', 'JusoorController@getIndex')
//            ->name('public.index');
        Route::get('/', [
            'as'   => 'public.index',
            'uses' => 'JusoorController@home2',
        ]);
        Route::get('sitemap.xml', 'JusoorController@getSiteMap')
            ->name('public.sitemap');

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), 'JusoorController@getView')
            ->name('public.single');

    });
});
