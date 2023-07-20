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

Route::prefix('employermanager')->group(function() {
    Route::get('/', 'EmployerManagerController@index');
});

Route::resource('employers', Modules\EmployerManager\Http\Controllers\EmployerController::class);

Route::get('employer/employees/{id}', 'EmployerController@employees')->name('employer.employees');
Route::resource('employees', Modules\EmployerManager\Http\Controllers\EmployeeController::class);

Route::get('employer/create-employees/{id}', 'EmployeeController@createEmployee')->name('employer.create-employees');
