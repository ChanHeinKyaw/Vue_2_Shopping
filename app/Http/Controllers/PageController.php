<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function addToCart($cart){
        $isInCart = ProductCart::where('user_id',Auth::user()->id)->where('product_id',$cart)->first();

        if($isInCart){
            $isInCart->update([
                'qty' => DB::raw("qty+1"),
            ]);
            return redirect()->back()->with('info','Increased Quantity In Your Cart');
        }else{           
            ProductCart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $cart,
                'qty' => 1
            ]);

            return redirect()->back()->with('success','Added To Cart!');
        }

    }

    public function viewCart(){
        $cart_datas = ProductCart::where('user_id',Auth::user()->id)->with('product')->latest()->paginate(10);
        return Inertia::render('ViewCart',['cart_datas' => $cart_datas ]);
    }

    public function viewCheckOut()
    {
        return Inertia::render('CheckOut');
    }

    public function checkOut(Request $request)
    {
        $carts = ProductCart::where('user_id', Auth::user()->id);
        foreach ($carts->get() as $cart) {
            ProductOrder::create([
                'user_id' => Auth::user()->id,
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        }
        $carts->delete();

        return redirect('/')->with('success', 'Checkout success! We will call back soon');
    }

    public function showProfile(){
        $user = Auth::user();
        return Inertia::render('Profile',['user' => $user]);
    }
}
