<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ContactController;




Route::get('/', function () {
})->name('admin.home');

// users

Route::resource('users', UserController::class, ['as' => 'admin']);


// services
Route::resource('services', ServiceController::class, ['as' => 'admin']);
Route::get('services/delete/{id}', [ServiceController::class, 'delete'])->name('admin.services.delete');




// contacts
Route::resource('contacts', ContactController::class, ['as' => 'admin']);
Route::get('contacts/delete/{id}', [ContactController::class, 'delete'])->name('admin.contacts.delete');
 
