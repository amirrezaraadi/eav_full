<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('attributes' ,  \App\Http\Controllers\AttributeController::class);
Route::apiResource('values' ,  \App\Http\Controllers\ValueController::class);
Route::apiResource('tags' ,  \App\Http\Controllers\TagController::class);
Route::post('register' , [\App\Http\Controllers\Auth\RegisteredUserController::class , 'store']);
Route::get('test' , [\App\Http\Controllers\Auth\RegisteredUserController::class , 'test']);
