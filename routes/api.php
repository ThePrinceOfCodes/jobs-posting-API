<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobCategoryController;

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

Route::post('job-categories', [JobCategoryController::class, 'store']);
Route::get('job-categories', [JobCategoryController::class, 'index']);

Route::post('job', [JobController::class, 'store']);
Route::get('job', [JobController::class, 'index']);
Route::patch('job/{id}', [JobController::class, 'update']);



