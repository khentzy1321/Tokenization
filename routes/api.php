<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookControllerAPI;
use App\Http\Controllers\API\PostController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[BookControllerAPI::class,'login']);
Route::post('register',[BookControllerAPI::class,'register']);
Route::post('reset-password',[BookControllerAPI::class,'reset-password']);

//posts
Route::get('getAllPosts',[PostController::class,'getAllPosts']);

Route::get('getPosts',[PostController::class,'getPosts']);
Route::get('searchPost',[PostController::class,'searchPost']);