<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;


//User
Route::get('/',[PageController::class,'index']);
Route::get('/product/{slug}',[PageController::class,'ProductDetail']);

//Admin
Route::get('/admin/login',[AuthController::class,'showLogin']);
Route::post('/admin/login',[AuthController::class,'postLogin']);

Route::group(["prefix"=>"admin","namespace'=>'admin"],function(){
    Route::get('/dashboard',[AuthController::class,'dashboard']);
    Route::resource("/category",CategoryController::class);
    Route::resource("/product",ProductController::class);
});