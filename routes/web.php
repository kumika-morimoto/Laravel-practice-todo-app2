<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/hello',[HelloController::class,'index']);
Route::middleware('auth')->group(function(){
    Route::get('/todos',[TodoController::class,'index']);
    Route::post('/todos',[TodoController::class,'store']);
    Route::patch('/todos/{id}/toggle',[TodoController::class,'toggle']);
    Route::get('/todos/{id}/edit',[TodoController::class,'edit']);
    Route::patch('/todos/{id}',[TodoController::class,'update']);
    Route::delete('/todos/{id}',[TodoController::class,'destroy']);
    Route::patch('/todos/{id}/toggleImportant',[TodoController::class,'toggleImportant'])->name('todos.toggleImportant');
});
Route::get('/register',[RegisterController::class,'showForm']);
Route::post('/register',[RegisterController::class,'register']);
Route::get('/login',[LoginController::class,'showForm'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');