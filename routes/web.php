<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Client\ServiceController;
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


Route::get('/dich-vu/{slug}', [ServiceController::class, 'detail'])->name('client.services.detail');




// Route::get();0



// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'CheckLogin', 'CheckAdmin']], function () {
//     include 'admin.php';
// });


Route::group(['prefix' => 'admin'], function () {
    include 'admin.php';
});
