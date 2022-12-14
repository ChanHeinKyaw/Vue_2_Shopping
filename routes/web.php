<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=>"admin","namespace'=>'admin"],function(){
    Route::resource("/category",CategoryController::class);
    Route::resource("/product",ProductController::class);
});