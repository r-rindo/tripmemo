<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\Admin\PlanController;

Route::controller(PlanController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
Route::get('plan/create', 'add')->name('plan.add');
Route::post('plan/create', 'create')->name('plan.create');
//Route::get('plan', 'index')->name('plan.index');
Route::get('plan/edit','edit')->name('plan.edit');
Route::post('plan/edit', 'update')->name('plan.update');
Route::get('plan/delete','delete')->name('plan.delete');
Route::post('plan/delete','delete')->name('plan.delete');
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(PlanController::class)->middleware('auth')->group(function() {
Route::get('/', 'index')->name('admin.home');
});

use App\Http\Controllers\Admin\SchedulleController;

Route::controller(SchedulleController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
Route::get('schedule/create','add')->name('schedule.add');
Route::post('schedule/create','create')->name('schedule.create');
Route::get('schedule', 'index')->name('schedule.index');
Route::get('schedule/edit', 'edit')->name('schedule.edit');
Route::post('schedule/edit','update')->name('schedule.update');
Route::get('schedule/delete','delete')->name('schedule.delete');
Route::post('schedule/delete','delete')->name('schedule.delete');
});
