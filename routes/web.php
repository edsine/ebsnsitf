<?php

use App\Http\Controllers\DropdownController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')
    ->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')
    ->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')
    ->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')
    ->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')
    ->name('io_generator_builder_rollback');
Route::post('generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile')
    ->name('io_generator_builder_generate_from_file');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/view-profile', [ProfileController::class, 'showProfile'])->name('view-profile');
Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile-update');
//Route::resource('users', UserController::class)->middleware('auth');
//Route::resource('roles', RoleController::class)->middleware('auth');
Route::post('api/fetch-locals', [DropdownController::class, 'fetchLocal']);

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
