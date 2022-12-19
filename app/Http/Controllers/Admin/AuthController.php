<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
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
        $user = Auth::user();
        return Inertia::render('Admin/Dashboard',['user' => $user]);
    }
}
