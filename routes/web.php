<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'homepage']);

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/url_page',[AdminController::class,'url_page']);

Route::post('/add_url',[AdminController::class,'add_url']);

Route::get('/show_url',[AdminController::class,'show_url']);

Route::get('/delete_url/{id}',[AdminController::class,'delete_url']);

Route::get('/edit_page/{id}',[AdminController::class,'edit_page']);

Route::post('/update_url/{id}',[AdminController::class,'update_url']);

Route::get('/url_detail/{id}',[HomeController::class,'url_detail']);

Route::get('/create_url',[HomeController::class,'create_url'])->middleware('auth');

Route::post('/user_url',[HomeController::class,'user_url'])->middleware('auth');

Route::get('/my_url',[HomeController::class,'my_url'])->middleware('auth');

Route::get('/my_url_del/{id}',[HomeController::class,'my_url_del'])->middleware('auth');

Route::get('/url_update_page/{id}',[HomeController::class,'url_update_page'])->middleware('auth');

Route::post('/update_url_data/{id}',[HomeController::class,'update_url_data'])->middleware('auth');

Route::get('accept_url/{id}',[AdminController::class,'accept_url']);

Route::get('reject_url/{id}',[AdminController::class,'reject_url']);