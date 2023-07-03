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

Route::middleware('auth:api')->get('/documentmanager', function (Request $request) {
    return $request->user();
});

Route::resource('folders', Modules\DocumentManager\Http\Controllers\API\FolderAPIController::class)
    ->except(['create', 'edit']);

Route::resource('documents', Modules\DocumentManager\Http\Controllers\API\DocumentAPIController::class)
    ->except(['create', 'edit']);

Route::resource('document-versions', Modules\DocumentManager\Http\Controllers\API\DocumentVersionAPIController::class)
    ->except(['create', 'edit']);

Route::resource('memos', Modules\DocumentManager\Http\Controllers\API\MemoAPIController::class)
    ->except(['create', 'edit']);