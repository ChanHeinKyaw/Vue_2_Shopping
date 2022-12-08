<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=>"admin","namespace'=>'admin"],function(){
    Route::resource("/category",CategoryController::class);
});