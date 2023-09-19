<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Client\ServiceController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\IntroduceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [WelcomeController::class, 'index'])->name('home');



// IntroduceController

Route::get('/gioi-thieu/{id}', [IntroduceController::class, 'index'])->name('client.introduce.index');


// services

Route::get('/dich-vu/', [ServiceController::class, 'index'])->name('client.services.index');
Route::get('/dich-vu/{slug}', [ServiceController::class, 'detail'])->name('client.services.detail');


// contact
Route::get('/lien-he', [ContactController::class, 'index'])->name('client.contact.index');
Route::post('/contact', [ContactController::class, 'contact_post'])->name('client.contact.post');





// Route::get();0



// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'CheckLogin', 'CheckAdmin']], function () {
//     include 'admin.php';
// });


Route::group(['prefix' => 'admin'], function () {
    include 'admin.php';
});
