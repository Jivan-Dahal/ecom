<?php

use App\Http\Controllers\Api\FoodController;
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


Route::get('/food',[FoodController::class,'food']);
Route::get('/food/{id}',[FoodController::class,'singlefood']);
Route::get('/delete/{id}',[FoodController::class,'delete']);
Route::post('/store',[FoodController::class,'store']);
