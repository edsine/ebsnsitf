<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/workflowengine', function (Request $request) {
    return $request->user();
});

Route::resource('field-types', Modules\WorkflowEngine\Http\Controllers\API\FieldTypeAPIController::class)
    ->except(['create', 'edit']);

Route::resource('actor-types', Modules\WorkflowEngine\Http\Controllers\API\ActorTypeAPIController::class)
    ->except(['create', 'edit']);

Route::resource('step-activities', Modules\WorkflowEngine\Http\Controllers\API\StepActivityAPIController::class)
    ->except(['create', 'edit']);

Route::resource('step-types', Modules\WorkflowEngine\Http\Controllers\API\StepTypeAPIController::class)
    ->except(['create', 'edit']);

Route::resource('workflow-types', Modules\WorkflowEngine\Http\Controllers\API\WorkflowTypeAPIController::class)
    ->except(['create', 'edit']);

Route::resource('actor-roles', Modules\WorkflowEngine\Http\Controllers\API\ActorRoleAPIController::class)
    ->except(['create', 'edit']);