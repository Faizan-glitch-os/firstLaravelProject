<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExampleController;

//show page based on auth
Route::get('/',[UserController::class, 'showCorrectHomepage']);

//register new user
Route::post('/registerNewUser', [UserController::class, 'registerNewUser']);

//login user
Route::post('/login', [UserController::class, 'login']);

//logout user
Route::post('/logout', [UserController::class, 'logout']);
