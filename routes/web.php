<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExampleController;


Route::get('/',[ExampleController::class, 'homepage']);

Route::get('/about', function (){
    return '<a href="/"><h1>Back to the homepage</h1></a>';
});

Route::post('/registerNewUser', [UserController::class, 'registerNewUser']);
