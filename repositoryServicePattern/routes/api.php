<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserServiceController;
use App\Services\UserService;
use App\Repositories\UserRepository;


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

/* Resource Routes create */
Route::resource('userServices', UserServiceController::class);      // Data View 
Route::resource('userServicesStore', UserServiceController::class);      // Data View 
