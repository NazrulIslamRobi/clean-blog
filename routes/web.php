<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashbordController;
use App\Http\Controllers\HomeController;

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

    Route::get('/',[HomeController::class,'home'])->name('home');


    Route::get('/dashbord',[dashbordController::class,'dashbord'])->name('dashbord')->middleware('auth');
    
    Route::get('/register/account',[AuthController::class,'showRegisterForm'])->name('register')->middleware('guest');
    Route::post('/register',[AuthController::class,'processRegister']);
    Route::get('/login/account',[AuthController::class,'showLoginForm'])->name('login');
    Route::post('/login',[AuthController::class,'processLogin']);
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/verify/{token}',[AuthController::class,'verify'])->name('verify.email');

    // Category crud are here
    Route::get('/category/list',[CategoryController::class,'index'])->name('index.category');
    Route::get('/category',[CategoryController::class,'showCategoryForm'])->name('show.category');
    Route::post('/create/category',[CategoryController::class,'storeCategory'])->name('store.category');
    Route::get('/category/{id}',[CategoryController::class,'detailsCategory'])->name('details.category');
    Route::get('category/edit/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::put('category/update/{id}',[CategoryController::class,'updateCategory'])->name('update.category');
    Route::delete('category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('delete.category');
   
   
    // post crud are here
    Route::resource('/posts',PostController::class);  
  