<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\CategoryController;

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

// Route::get('/demo', function(){
//     return "Hello";
// });

Route::resource('/admin/slider', SliderController::class);

// Route::resource('/admin/category', CategoryController::class);
// Route::post('/admin/slider', [SliderController::class, 'store']);