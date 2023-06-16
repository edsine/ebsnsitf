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

Route::prefix('documentmanager')->group(function () {
    Route::get('/', 'DocumentManagerController@index');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('documentmanager')->group(function () {
        Route::resource('folders', Modules\DocumentManager\Http\Controllers\FolderController::class);
        Route::get('folders/edit/sub_folders/{id}/{parent_folder_id}', [Modules\DocumentManager\Http\Controllers\FolderController::class, 'editSubFolder'])->name('folders.edit.sub_folders');
        Route::resource('documents', Modules\DocumentManager\Http\Controllers\DocumentController::class);
        Route::get('documents/documentVersions/{id}', [Modules\DocumentManager\Http\Controllers\DocumentController::class, 'documentVersions'])->name('documents.documentVersions.index');
        Route::resource('documentVersions', Modules\DocumentManager\Http\Controllers\DocumentVersionController::class);
    });
});
