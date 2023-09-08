<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanvienController;
use App\Http\Controllers\Auth\LoginController;

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
Route::match(['GET', 'POST'], '/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'loguot'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/list/nhanvien', [NhanvienController::class, 'index'])->name('list-nhanvien');
    Route::post('/search/nhanvien',
        [NhanvienController::class, 'index'])->name('search-nhanvien');
    Route::match(['GET', 'POST'], '/add/nhanvien',
        [NhanvienController::class, 'add'])->name('add-nhanvien');
    Route::match(['GET', 'POST'], '/edit/nhanvien/{id}',
        [NhanvienController::class, 'edit'])->name('edit-nhanvien');
//    Route::match(['GET', 'POST'], '/biensoan/nhanvien/{id}',
//        [NhanvienController::class, 'biensoan'])->name('biensoan-nhanvien');
//    Route::get('/delete/nhanvien/{id}',
//        [NhanvienController::class, 'delete'])->name('delete-nhanvien');

});

