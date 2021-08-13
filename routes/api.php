<?php

use App\Http\Controllers\AvatarUsersController;
use Illuminate\Support\Facades\Route;

// auth
Route::post('/avatar-user', [AvatarUsersController::class, 'store']);
Route::get('/user', [AvatarUsersController::class, 'show'])
     ->middleware('auth:sanctum');
