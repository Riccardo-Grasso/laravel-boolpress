<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::middleware("auth")->get('/user', function () {
    return response()->json(Auth::user());
});

Route::get("/posts", "Api\PostController@index");
Route::get("/posts/{slug}", "Api\PostController@show");

Route::get("/categories", "Api\CategoryController@index");
Route::get("/categories/{category}", "Api\CategoryController@show");

Route::post("/contacts", "Api\ContactController@store");
