<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::put('/user/{user}', [UserController::class, 'updateRole'])->middleware(CheckRole::class.':admin')->name('user.updateRole');

    Route::get('/task/create', [TaskController::class, 'create'])->middleware(CheckRole::class.':professor')->name('task.create');
    Route::post('/task', [TaskController::class, 'store'])->middleware(CheckRole::class.':professor')->name('task.store');
    Route::get('/task', [TaskController::class, 'index'])->name('task.index');
});
Route::post('/lang', [LanguageController::class, 'switchLang'])->name('lang.switch');


