<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class AuthController extends Controller
{
    public function showRegister(){
        return Inertia::render('Auth/Register');
    }

    public function showLogin(){
        return Inertia::render('Auth/Login');
    }
}
