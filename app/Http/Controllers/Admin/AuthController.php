<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
        return Inertia::render('Admin/Login');
    }

    public function postLogin(){
        $cre = request()->only('email','password');

        if(Auth::attempt($cre)){
            $user = Auth::user();
            if($user->role == 'admin'){
                return redirect('admin/dashboard'); 
            }else{
                return redirect("admin/login")->with("danger" , "You Are Not Admin Yet");
            }
        }else{
            return redirect("admin/login")->with("danger" , "Email And Password Don't Match");
        }
    }

    public function dashboard(){
        $data = [];
        $data['category'] = Category::count();
        $data['product'] = Product::count();
        $data['pending'] = ProductOrder::where('status','pending')->count();
        $data['complete'] = ProductOrder::where('status','complete')->count();
        $data['users'] = User::take(5)->get();
        return Inertia::render('Admin/Dashboard',['data' => $data]);
    }
}
