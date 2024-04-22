<?php

use App\Http\Controllers\Auth\AuthUserController;
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
*/
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test', function(){ return 'Test Api'; });


Route::post('/auth/log-user-in', [AuthUserController::class, 'login']);
Route::post('/auth/log-user-out', [AuthUserController::class, 'logout']);

Route::get('/retrieve-applicant-profiles', [PersonalProfileController::class, 'index']);

Route::get('/application-before-submission/{slug}', [PersonalProfileController::class, 'show']);
Route::post('/create-applicant-profile', [PersonalProfileController::class, 'store']);
Route::post('/update-applicant-profile', [PersonalProfileController::class, 'update']);
Route::get('/get-applicant-details/code-{slug}', [PersonalProfileController::class, 'searchApplicationCode']);
Route::get('/application-submission/{slug}', [PersonalProfileController::class, 'submitApplication']);

Route::post('/create-business-profile/{slug}', [BusinessProfileController::class, 'store']);
Route::get('/get-business-profile/{slug}', [BusinessProfileController::class, 'searchBusinessDetail']);
Route::post('/update-business-profile/{slug}', [BusinessProfileController::class, 'update']);

Route::post('/create-competition-profile/{slug}', [CompetitionStatusController::class, 'store']);
Route::get('/get-competition-details/{slug}', [CompetitionStatusController::class, 'searchCompetitionDetail']);
Route::post('/update-competition-profile/{slug}', [CompetitionStatusController::class, 'update']);

Route::post('/create-business-projection/{slug}', [ProjectionController::class, 'store']);
Route::get('/get-projection-detail/{slug}', [ProjectionController::class, 'searchProjectionDetail']);
Route::post('/update-business-projection/{slug}', [ProjectionController::class, 'update']);