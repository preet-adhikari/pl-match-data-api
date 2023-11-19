<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\MatchResultController;
use App\Http\Controllers\PasswordResetController;
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
    Route::get('forgot-password', [PasswordResetController::class, 'handlePasswordReset']);
    Route::post('forgot-password', [PasswordResetController::class, 'forgotPassword'])->name('password.reset');
    Route::post('process-password-reset', [PasswordResetController::class, 'processPasswordRequest'])->name('password.update');

    Route::group(['middleware' => 'auth:api'], function(){
        
        // Adding route regex registration method
        Route::post('logout' , [ApiAuthController::class , 'logout'])->name('logout');
        Route::get('season/{season}', [SeasonDataController::class, 'getIndividualSeasonData']);
        
        // Get individual team data
        Route::get('team/{team}', [MatchResultController::class, 'getAllMatchResultsForIndividualTeam']);

        // Get a list of match results for an individual team for a particular season
        Route::post('team_season' , [MatchResultController::class, 'getIndividualSeasonResultsForATeam']);

    });

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
});

