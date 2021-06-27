<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [App\Http\Controllers\AuthController::class, 'register'])->name('api.register');

Route::group([
    'namespace'=> 'App\Http\Controllers',
    'prefix' => 'user',
    'name' => 'user'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('profile', 'AuthController@profile');
});

Route::resource('user',App\Http\Controllers\UserController::class)->except(['edit','create']);
Route::resource('asset',App\Http\Controllers\AssetController::class)->except(['edit','create']);
Route::resource('vendor',App\Http\Controllers\VendorController::class)->except(['edit','create']);
Route::resource('asset_assignment',App\Http\Controllers\AssetAssignmentController::class)->except(['edit','create']);


route::middleware('guest')->get('', function(){
    return "Unauthenticated";
})->name('login');

