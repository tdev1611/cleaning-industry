<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\IntroduceController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ImageBannerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProcedureController;
use App\Http\Controllers\Admin\CategoryNewController;
use App\Http\Controllers\Admin\NewController;
 

Route::get('/', function () {
})->name('admin.home');




Route::get('/', [DashboardController::class, 'index'])->name('admin.home');


// setting
Route::resource('setting', SettingController::class, ['as' => 'admin']);

// banner
Route::resource('banner', BannerController::class, ['as' => 'admin']);

// image-banner
Route::resource('image-banner', ImageBannerController::class, ['as' => 'admin']);
Route::get('image-banner/delete/{id}', [ImageBannerController::class, 'delete'])->name('admin.image_banner.delete');



// users

Route::resource('users', UserController::class, ['as' => 'admin']);


// services
Route::resource('services', ServiceController::class, ['as' => 'admin']);
Route::get('services/delete/{id}', [ServiceController::class, 'delete'])->name('admin.services.delete');


// category-news
Route::resource('categories-new', CategoryNewController::class, ['as' => 'admin']);
Route::get('categories-new/delete/{id}', [CategoryNewController::class, 'delete'])->name('admin.categories-new.delete');


// news

Route::resource('news', NewController::class, ['as' => 'admin']);
Route::get('news/delete/{id}', [NewController::class, 'delete'])->name('admin.news.delete');




// contacts
Route::resource('contacts', ContactController::class, ['as' => 'admin']);
Route::get('contacts/delete/{id}', [ContactController::class, 'delete'])->name('admin.contacts.delete');


// contacts-info
Route::resource('contact-info', ContactInfoController::class, ['as' => 'admin']);


// procedures
Route::resource('procedures', ProcedureController::class, ['as' => 'admin']);
Route::get('procedures/delete/{id}', [ProcedureController::class, 'delete'])->name('admin.procedures.delete');





// introduce
Route::resource('introduce', IntroduceController::class, ['as' => 'admin']);
