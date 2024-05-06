<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/home/{name}', [HomeController::class, 'welcome']);
Route::get('/m/migrate', [HomeController::class, 'migrate']);
Route::get('/m/seed', [HomeController::class, 'seed']);
Route::get('/m/storage', [HomeController::class, 'storage']);
Route::get('/m/session', [HomeController::class, 'session']);

//route resource for products
Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/students', \App\Http\Controllers\StudentController::class);
