<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ZoneController;
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
/*
Route::get('/', function () {
    return view('frontend.welcome');
});
*/
// backend route
Route::get('/admins',[AdminController::class,'index']);
Route::post('/admin-dashboard',[AdminController::class,'show_dashboard']);
Route::get('/dashboard',[SuperAdminController::class,'dashboard']);
Route::get('/logout',[SuperAdminController::class,'logout']);

//category route here...
Route::resource('/divisions',DivisionController::Class);
Route::get('/division-trash',[DivisionController::class,'trash']);
Route::get('/divisions/restore/{id}',[DivisionController::class,'restore'])->name('division.restore');
Route::get('/divisions/delete/{id}',[DivisionController::class,'forceDelete'])->name('division.delete');

//subcategory route here...
Route::resource('/zones',ZoneController::Class);
Route::get('/zones-trash',[ZoneController::class,'trash']);
Route::get('/zones/restore/{id}',[ZoneController::class,'restore'])->name('zone.restore');
Route::get('/zones/delete/{id}',[ZoneController::class,'forceDelete'])->name('zone.delete');

// frontend route
Route::get('/',[HomeController::class,'index']);