<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\postController;
use App\Http\Controllers\Api\categoryController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/user/login',[AuthController::class,'login']);
Route::post('/user/register',[AuthController::class,'register']);

Route::get('posts',[postController::class,'posts']);
Route::post('posts/search',[postController::class,'posts']);

Route::get('category',[categoryController::class,'category']);

