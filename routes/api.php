<?php

use App\Http\Controllers\Sido\BusinessProfileController;
use App\Http\Controllers\Sido\CompetitionStatusController;
use App\Http\Controllers\Sido\PersonalProfileController;
use App\Http\Controllers\Sido\ProjectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test', function(){ return 'Test Api'; });


Route::get('/get-applicant-profiles', [PersonalProfileController::class, 'index']);
Route::get('/application-before-submission/{slug}', [PersonalProfileController::class, 'show']);
Route::post('/create-applicant-profile', [PersonalProfileController::class, 'store']);
Route::post('/update-applicant-profile', [PersonalProfileController::class, 'update']);
Route::get('/get-application-profile/{slug}', [PersonalProfileController::class, 'searchApplicationCode']);

Route::post('/create-business-profile/{slug}', [BusinessProfileController::class, 'store']);
Route::post('/update-business-profile/{slug}', [BusinessProfileController::class, 'update']);
Route::get('/get-business-profile/{slug}', [BusinessProfileController::class, 'searchBusinessDetail']);

Route::post('/create-competition-profile/{slug}', [CompetitionStatusController::class, 'store']);
Route::post('/update-competition-profile/{slug}', [CompetitionStatusController::class, 'update']);

Route::post('/create-business-projection/{slug}', [ProjectionController::class, 'store']);
Route::post('/update-business-projection/{slug}', [ProjectionController::class, 'update']);