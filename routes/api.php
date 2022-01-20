<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('/auth')->group(function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
});
Route::prefix('/wishlist')->group(function () {
    Route::post('/create', 'WishlistController@create');
    Route::post('/update', 'WishlistController@update');
    Route::post('/delete', 'WishlistController@delete');
    Route::post('/show', 'WishlistController@show');
});
Route::prefix('/item')->group(function () {
    Route::post('/create', 'ItemController@create');
    Route::post('/update', 'ItemController@update');
    Route::post('/delete', 'ItemController@delete');
});
Route::prefix('/User')->group(function () {
    Route::post('/create', 'UserController@create');
    Route::post('/update', 'UserController@update');
    Route::post('/delete', 'UserController@delete');
    Route::post('/show', 'UserController@show');
});
