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

// Route::prefix('humanresource')->group(function() {
//     Route::get('/', 'HumanResourceController@index');
// });
// Route::resource('leave_request', LeaveRequestController::class);


Route::prefix('leave_request')->group(function() {
    Route::get('/', 'LeaveRequestController@index');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('leave_request')->group(function () {
        Route::resource('leave_request', Modules\HumanResource\Http\Controllers\LeaveRequestController::class);
    });
});
