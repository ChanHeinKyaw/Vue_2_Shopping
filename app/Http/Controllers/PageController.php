<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Inertia\Inertia;
use App\Models\Product;

class PageController extends Controller
{
    public function index(){
        $product = Product::with('category')->latest()->paginate(6);
        return Inertia::render('Index',['product' => $product]);
    }

    public function ProductDetail($slug){
        $product = Product::where('slug',$slug)->with('category')->first();
        return Inertia::render('ProductDetail',['product' => $product]);
    }

    public function ProductByCategory($slug){
        $cat_id = Category::where('slug',$slug)->first()->id;
        $product = Product::where('category_id',$cat_id)->with('category')->latest()->paginate(6);

        return Inertia::render('Index',['product' => $product]);
    }

    public function searchProduct($search){
        $product = Product::where('name','like',"%$search%")->with('category')->latest()->paginate(6);
        return Inertia::render('Index', ['product' => $product]);
    }
}
