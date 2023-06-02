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

Route::prefix('workflowengine')->group(function () {
    Route::get('/', 'WorkflowEngineController@index');
    Route::resource('fieldTypes', Modules\WorkflowEngine\Http\Controllers\FieldTypeController::class);
    Route::resource('actorTypes', Modules\WorkflowEngine\Http\Controllers\ActorTypeController::class);
    Route::resource('stepActivities', Modules\WorkflowEngine\Http\Controllers\StepActivityController::class);
    Route::resource('stepTypes', Modules\WorkflowEngine\Http\Controllers\StepTypeController::class);
    Route::resource('workflowTypes', Modules\WorkflowEngine\Http\Controllers\WorkflowTypeController::class);
    Route::resource('actorRoles', Modules\WorkflowEngine\Http\Controllers\ActorRoleController::class);
});
