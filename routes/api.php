<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiNhanvienController;
use App\Http\Controllers\AuthController;

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

// Route::group([
//     'prefix' => 'auth'
// ], function () {

//     Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
//     Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
// });
Route::prefix('/nhanvien')->group(function () {
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::delete('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
        Route::get('/', [ApiNhanvienController::class, 'index']); //lấy ra danh sách
        Route::get('/search/{ten}', [ApiNhanvienController::class, 'search']);
        Route::post('/add-nhanvien', [ApiNhanvienController::class, 'store']); //thêm
        Route::get('/{id}', [ApiNhanvienController::class, 'show']); //hiển thị sua
        Route::put('/{id}', [ApiNhanvienController::class, 'update']); //sua
        Route::delete('/{id}', [ApiNhanvienController::class, 'destroy']);
    });
});
