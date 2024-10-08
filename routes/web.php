<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/view', 'auth.login');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginPage'])->name('auth.login.page');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
    Route::get('/signup', [\App\Http\Controllers\AuthController::class, 'signupPage'])->name('auth.signup.page');
    Route::post('/signup', [\App\Http\Controllers\AuthController::class, 'signup'])->name('auth.signup');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'loginPage'])->name('home');
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');



    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/insight', function () {
        return view('insight');
    })->name('insight');

    Route::get('/typo', function () {
        return view('typo');
    })->name('typo');


    Route::post('/form', function (Request $request) {
        \Illuminate\Support\Facades\Session::flash('_status', 'success');
        return view('insight');
    })->name('form.typo');


    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.delete');
});
