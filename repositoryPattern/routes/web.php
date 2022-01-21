<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/usersDemo/create', function () {
//     return view('createUser');
// });

Route::get('/usersDemo', [App\Http\Controllers\UserRoutesController::class,'getAllData'])->name('user.getAllData'); // All Data Get
Route::get('/usersDemo/create', [App\Http\Controllers\UserRoutesController::class,'userCreate'])->name('user.create'); // User Create Form Show
Route::post('/usersDemo/userStoreData', [App\Http\Controllers\UserRoutesController::class,'dataStore'])->name('dataStore'); // Data Submit


/* Not Working Routes */
Route::get('/usersDemo/edit/{id}', [App\Http\Controllers\UserRoutesController::class,'userEdit'])->name('user.edit');
Route::post('/userDemos', [App\Http\Controllers\UserRoutesController::class,'userStore'])->name('user.store');
Route::put('/usersDemo/{id}', [App\Http\Controllers\UserRoutesController::class,'userUpdate'])->name('user.update');
Route::delete('/usersDemo/{id}', [App\Http\Controllers\UserRoutesController::class,'userDelete'])->name('user.delete');