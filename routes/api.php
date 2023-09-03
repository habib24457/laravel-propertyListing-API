<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\PropertiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//public routes
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::get('/brokers', [BrokerController::class, 'index'])->name('brokers.index');
Route::get('/brokers/{broker}', [BrokerController::class, 'show'])->name('brokers.show');
Route::get('/properties', [BrokerController::class, 'index'])->name('brokers.index');
Route::get('/properties/{property}', [BrokerController::class, 'show'])->name('brokers.show');

//Protected routes
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('/logout',[AuthController::class,'logout']);
});