<?php

use Illuminate\Support\Facades\Route;


// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Generate Auth routes
Auth::routes();

// Create people, and show them
Route::get('create', [App\Http\Controllers\PeopleController::class, 'create'])->middleware('auth')->name('create');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// For creating new people
Route::post('/people/store', [App\Http\Controllers\PeopleController::class, 'store'])->name('people.store')->middleware('auth');

// show all users
Route::get('/show/users', [App\Http\Controllers\HomeController::class, 'show'])->name('show.users');

// show update user view
Route::get('/update/user/{userId}', [App\Http\Controllers\HomeController::class, 'showUpdateUserView'])->name('update.userview');

// update user
Route::put('/update/user/password/{userId}', [App\Http\Controllers\HomeController::class, 'update'])->name('update.user.password');

// delete user
Route::delete('/delete/user/{userId}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete.user');

// update people
Route::get('/update/user/{userId}/view', [App\Http\Controllers\PeopleController::class, 'updateView'])->name('update.view.user');

// update people
Route::put('/update/{userId}/user', [App\Http\Controllers\PeopleController::class, 'update'])->name('update.user');

// delete people
Route::delete('/delete/people/{userId}', [App\Http\Controllers\PeopleController::class, 'delete'])->name('delete.people');
