<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function pending(){
        $pendingOrders = ProductOrder::where('user_id',Auth::user()->id)->where('status','pending')->with('product')->latest()->get();

        return Inertia::render('PendingOrderList',['pendingOrders' => $pendingOrders]);
    }

    public function complete(){
        $completeOrders = ProductOrder::where('user_id',Auth::user()->id)->where('status','complete')->with('product')->latest()->get();

        return Inertia::render('CompleteOrderList',['completeOrders' => $completeOrders]);
    }
}
