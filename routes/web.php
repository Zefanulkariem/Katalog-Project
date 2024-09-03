<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Middleware\Role;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin
Route::middleware(['auth', Role::class])->prefix('admin')->group(function () { //edit
    Route::get('/', function () {
        return view('admin.index');
    });
});

// user
Route::get('/', [FrontController::class, 'index']);