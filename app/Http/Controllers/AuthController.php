<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister(){
        return Inertia::render('Auth/Register');
    }

    public function postRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        //Create
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Auth
        $cre = $request->only('email','password');

        if(Auth::attempt($cre)){
            return redirect('/')->with('success','Welcome '. $request->name);
        }
    }

    public function showLogin(){
        return Inertia::render('Auth/Login');
    }
}
