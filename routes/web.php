<?php

use App\Http\Controllers\crudController;
use Illuminate\Support\Facades\Route;

Route::get('/',[crudController::class,"index"]);
Route::post('/add/user',[crudController::class,"adduser"]);
Route::delete('/del/user/{id}',[crudController::class,"deluser"]);
Route::get('/editview/hi/{id}',[crudController::class,"editviewuser"]);
Route::post('/edit/hi/{id}',[crudController::class,"edituser"]);