<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController as UserAuthController;
use App\Http\Controllers\Admin\CategoryController;

//Auth
Route::get('/register',[UserAuthController::class,'showRegister']);
Route::post('/register',[UserAuthController::class,'postRegister']);

Route::get('/login',[UserAuthController::class,'showLogin']);
Route::post('/login',[UserAuthController::class,'postLogin']);

Route::get('/logout',[UserAuthController::class,'logout']);

//User
Route::get('/',[PageController::class,'index']);
Route::get('/product/{slug}',[PageController::class,'ProductDetail']);
Route::get('/product/category/{slug}',[PageController::class,'ProductByCategory']);
Route::get('/product/search/{search}',[PageController::class,'searchProduct']);

//Admin
Route::get('/admin/login',[AuthController::class,'showLogin']);
Route::post('/admin/login',[AuthController::class,'postLogin']);

Route::group(["prefix"=>"admin","namespace'=>'admin"],function(){
    Route::get('/dashboard',[AuthController::class,'dashboard']);
    Route::resource("/category",CategoryController::class);
    Route::resource("/product",ProductController::class);
});