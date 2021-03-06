<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::get('/event/{id}', [UserController::class, 'showEventDetail']);
Route::post('/event/{id}/confirm', [UserController::class, 'showConfirmation']);
Route::post('/event/{id}/register', [UserController::class, 'register']);
Route::get('/event/{id}/register', [UserController::class, 'showRegister']);
