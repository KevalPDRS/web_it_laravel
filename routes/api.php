<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyAuth\LoginController;



Route::post('/my-login',[LoginController::class, 'login']);