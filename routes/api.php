<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\ApiTest;
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

//we should put 'api' prefix in the url
Route::get('/apiTest', [ApiTest::class, 'index']);

//we should put 'api' prefix in the url
Route::post('/apiTest/adding', [ApiTest::class, 'store']);


Route::get('/ApiPosts', [ApiPostController::class, 'index'])->middleware('auth:sanctum');
Route::post('/ApiPostsStoring' , [ApiPostController::class, 'store'])->middleware('auth:sanctum');
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);