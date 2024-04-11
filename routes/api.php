<?php

use App\Http\Controllers\ProfileApplicationController;
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
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::post('/create-applicant-profile', [ProfileApplicationController::class, 'store']);
Route::post('/create-applicant-profile', [PersonalProfileController::class, 'store']);
Route::post('/create-business-profile/{slug}', [BusinessProfileController::class, 'store']);
Route::post('/create-competition-profile/{slug}', [CompetitionStatusController::class, 'store']);
Route::post('/create-business-projection/{slug}', [ProjectionController::class, 'store']);