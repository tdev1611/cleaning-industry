<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Client\ServiceController;
use App\Http\Controllers\Client\ContactController;
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


Route::get('/dich-vu/', [ServiceController::class, 'index'])->name('client.services.index');
Route::get('/dich-vu/{slug}', [ServiceController::class, 'detail'])->name('client.services.detail');


// contact
Route::post('/contact}', [ContactController::class, 'contact_post'])->name('client.contact.post');





// Route::get();0



// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'CheckLogin', 'CheckAdmin']], function () {
//     include 'admin.php';
// });


Route::group(['prefix' => 'admin'], function () {
    include 'admin.php';
});