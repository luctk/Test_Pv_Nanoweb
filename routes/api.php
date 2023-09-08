<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiNhanvienController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('/nhanvien')->group(function (){
    Route::get('/',[ApiNhanvienController::class,'index']); //lấy ra danh sách
    Route::post('/add-nhanvien',[ApiNhanvienController::class,'store']); //thêm
    Route::get('/{id}',[ApiNhanvienController::class,'show']);//hiển thị sua
    Route::put('/{id}',[ApiNhanvienController::class,'update']); //sua
    Route::delete('/{id}',[ApiNhanvienController::class,'destroy']);
});
