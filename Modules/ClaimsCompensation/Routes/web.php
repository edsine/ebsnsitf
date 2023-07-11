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

Route::prefix('claimscompensation')->group(function() {
    Route::get('/', 'ClaimsCompensationController@index');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('claimscompensation')->group(function () {
        Route::resource('claimscompensation', Modules\ClaimsCompensation\Http\Controllers\ClaimsCompensationController::class);
    });
});
