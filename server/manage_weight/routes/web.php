<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('weights/create', 'WeightsController@showCreateWeights')->name('weights.create');
    Route::post('weights/create', 'WeightsController@create');

    Route::group(['middleware' => 'can:view,weight'], function() {
        Route::get('weights/{weight}/index', 'WeightsController@index')->name('weights.index');

        Route::get('/weights/{weight}/edit', 'WeightsController@showEditWeights')->name('weights.edit');
        Route::post('/weights/{weight}/edit', 'WeightsController@edit');

        Route::delete('/weights/{weight}/delete', 'WeightsController@delete')->name('weights.delete');
    });

    Route::get('/weights/manualList', 'WeightsController@manualList')->name('weights.manualList');
    Route::get('/weights/manualHome', 'WeightsController@manualHome')->name('weights.manualHome');
    Route::get('/weights/manualWeightGraph', 'WeightsController@manualWeightGraph')->name('weights.manualWeightGraph');
    Route::get('/weights/manualWeightList', 'WeightsController@manualWeightList')->name('weights.manualWeightList');


    Route::get('/weights/weekList', 'WeightsController@showWeightsWeekList')->name('weights.weekList');
    Route::get('/weights/monthList', 'WeightsController@showWeightsMonthList')->name('weights.monthList');


    Route::get('/weights/{id}/weekGraph', 'WeightsController@showWeightsWeekGraph')->name('weights.weekGraph');
    Route::get('/weights/{id}/oneMonthGraph', 'WeightsController@showWeightsOneMonthGraph')->name('weights.oneMonthGraph');
    Route::get('/weights/{id}/threeMonthGraph', 'WeightsController@showWeightsThreeMonthGraph')->name('weights.threeMonthGraph');
    Route::get('/weights/{id}/halfYearGraph', 'WeightsController@showWeightsHalfYearGraph')->name('weights.halfYearGraph');
    Route::get('/weights/{id}/oneYearGraph', 'WeightsController@showWeightsOneYearGraph')->name('weights.oneYearGraph');

});


Auth::routes();
