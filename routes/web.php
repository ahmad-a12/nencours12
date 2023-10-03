<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

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


//-------------------------AUTH------------------------//
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::controller(AuthController::class)->group(function(){
    Route::get('/register','register')->name('register');
    Route::post('/register','store')->name('register.store');
    Route::get('/login','login')->name('login');
    Route::post('/login','save')->name('login.save');
    Route::get('/logout','logout')->name('logout');
   });



//-------------------------HOME------------------------//
// Route::get('/home',[HomeController::class,'home'])->name('home');
Route::get('/home',[EditController::class,'home'])->name('home');
     Route::get('/editInfo/{id}',[EditController::class,'editInfo'])->name('editInfo')->middleware('auth');
     Route::post('/updateInfo/{id}',[EditController::class,'updateInfo'])->name('updateInfo')->middleware('auth');
     Route::put('/password/{id}',[EditController::class,'password'])->name('password')->middleware('auth');



//-------------------------CATEGORY-----------------------//
Route::get('/cat',[CategoryController::class,'index'])->name('cat');
Route::controller(CategoryController::class)->middleware('auth')->group(function(){
    Route::get('cat/create','create')->name('cat.create');
    Route::post('cat/store','store')->name('cat.store');
    Route::get('cat/edit/{id}','edit')->name('cat.edit');
    Route::post('cat/update/{id}','update')->name('cat.update');
    Route::get('cat/show/{id}','show')->name('cat.show');
    Route::get('cat/ddd/{id}','destroy')->name('cat.destroy');

});



//-------------------------STORE-------------------------//
Route::get('/store',[StoreController::class,'index'])->name('store');
Route::controller(StoreController::class)->middleware('auth')->group(function(){
    Route::get('store/create','create')->name('store.create');
    Route::post('store/store','store')->name('store.store');
    Route::get('store/edit/{id}','edit')->name('store.edit');
    Route::post('store/update/{id}','update')->name('store.update');
    Route::get('store/show/{id}','show')->name('store.show');
    Route::get('store/ddd/{id}','destroy')->name('store.destroy');

});