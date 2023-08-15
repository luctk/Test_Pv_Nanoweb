<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/list/nhanvien',[\App\Http\Controllers\NhanvienController::class,'index'])->name('list-nhanvien');
Route::post('/search/nhanvien',[\App\Http\Controllers\NhanvienController::class,'index'])->name('search-nhanvien');
Route::match(['GET','POST'],'/add/nhanvien',[\App\Http\Controllers\NhanvienController::class,'add'])->name('add-nhanvien');
Route::match(['GET','POST'],'/edit/nhanvien/{id}',[\App\Http\Controllers\NhanvienController::class,'edit'])->name('edit-nhanvien');
