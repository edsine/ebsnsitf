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

        Route::get('folders/edit/documents/{id}/{folder_id}', [Modules\DocumentManager\Http\Controllers\DocumentController::class, 'folderEditDocument'])->name('folders.documents.edit');

        Route::get('folders/documents/documentVersions/{id}', [Modules\DocumentManager\Http\Controllers\DocumentController::class, 'folderDocumentVersions'])->name('folders.documents.documentVersions.index');

        Route::resource('documents', Modules\DocumentManager\Http\Controllers\DocumentController::class);

        Route::resource('memos', Modules\DocumentManager\Http\Controllers\MemoController::class);

        Route::get('memos/memoVersions/{id}', [Modules\DocumentManager\Http\Controllers\MemoController::class, 'memoVersions'])->name('memos.memoVersions.index');

        Route::get('memos/assignedToUser/index', [Modules\DocumentManager\Http\Controllers\MemoController::class, 'viewMemosAssignedToUser'])->name('memos.assignedToUser');

        Route::post('memos/assignToUsers', [Modules\DocumentManager\Http\Controllers\MemoController::class, 'assignToUsers'])->name('memos.assignToUsers');

        Route::post('memos/assignToDepartments', [Modules\DocumentManager\Http\Controllers\MemoController::class, 'assignToDepartments'])->name('memos.assignToDepartments');

        Route::get('memos/assignedUsers/{id}', [Modules\DocumentManager\Http\Controllers\MemoController::class, 'assignedUsers'])->name('memos.assignedUsers');

        Route::get('memos/assignedDepartments/{id}', [Modules\DocumentManager\Http\Controllers\MemoController::class, 'assignedDepartments'])->name('memos.assignedDepartments');

        Route::delete('memos/assignedUsers/delete/{user_id}/{memo_id}', [Modules\DocumentManager\Http\Controllers\MemoController::class, 'deleteAssignedUser'])->name('memos.assignedUsers.destroy');

        Route::delete('memos/assignedDepartments/delete/{department_id}/{memo_id}', [Modules\DocumentManager\Http\Controllers\MemoController::class, 'deleteAssignedDepartment'])->name('memos.assignedDepartments.destroy');
    });
});
