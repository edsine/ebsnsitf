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

Route::prefix('workflowengine')->group(function() {
    Route::get('/', 'WorkflowEngineController@index');
});

Route::resource('field-types', Modules\WorkflowEngine\Http\Controllers\FieldTypeController::class);
Route::resource('actor-types', Modules\WorkflowEngine\Http\Controllers\ActorTypeController::class);
Route::resource('step-activities', Modules\WorkflowEngine\Http\Controllers\StepActivityController::class);
Route::resource('step-types', Modules\WorkflowEngine\Http\Controllers\StepTypeController::class);
Route::resource('workflow-types', Modules\WorkflowEngine\Http\Controllers\WorkflowTypeController::class);
Route::resource('actor-roles', Modules\WorkflowEngine\Http\Controllers\ActorRoleController::class);