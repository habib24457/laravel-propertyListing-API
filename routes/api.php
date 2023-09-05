<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokersController;
use App\Http\Controllers\PropertiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/brokers', [BrokersController::class, 'index'])->name('brokers.index');
Route::get('/brokers/{broker}', [BrokersController::class, 'show'])->name('brokers.show');
Route::get('/properties', [PropertiesController::class, 'index'])->name('brokers.index');
Route::get('/properties/{property}', [PropertiesController::class, 'show'])->name('brokers.show');

Route::apiResource('/properties', PropertiesController::class)->only(['store', 'update', 'destroy']);
Route::apiResource('/brokers', BrokersController::class)->only(['store', 'update', 'destroy']);




/*Protected routes: only the logged in users can access 
*
*/
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
