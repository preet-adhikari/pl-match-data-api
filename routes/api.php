<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\SeasonDataController;
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

Route::group(['middleware' => 'json.response'], function() {
    Route::post('login', [ApiAuthController::class, 'login'])->name('login');
    Route::post('register', [ApiAuthController::class, 'register'])->name('register');

    Route::group(['middleware' => 'auth:api'], function(){
        
        // Adding route regex registration method
        // Route::get('hell' , function(){
        //     dd("hellu");
        // });
        Route::post('logout' , [ApiAuthController::class , 'logout'])->name('logout');
        Route::get('season/{season}', [SeasonDataController::class, 'getIndividualSeasonData']);
        // Route::get('season/{season}', [SeasonDataController::class, 'getIndividualSeasonData']);
    });

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
});

