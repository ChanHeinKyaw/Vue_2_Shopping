<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $product = Product::with('category')->latest()->paginate(6);
        return Inertia::render('Index',['product' => $product]);
    }
}
