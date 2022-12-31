<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function pending(){
        $Orders = ProductOrder::where('user_id',Auth::user()->id)->where('status','pending')->with('product')->latest()->get();

        return Inertia::render('OrderList',['Orders' => $Orders]);
    }

    public function complete(){
        $Orders = ProductOrder::where('user_id',Auth::user()->id)->where('status','complete')->with('product')->latest()->get();

        return Inertia::render('OrderList',['Orders' => $Orders]);
    }
}
