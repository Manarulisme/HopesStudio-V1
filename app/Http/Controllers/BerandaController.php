<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(): View
    {
        return view('Beranda');
    }

    public function login(): View
    {
        return view('Login');
    }

    public function register(): View
    {
        return view('Register');
    }

    public function postRegister(Request $request){
        //input name is 'name, email, no_telepon, password'
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'no_telepon' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        $user = \App\Models\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'no_telepon' => $validatedData['no_telepon'],
            //random remember token
            'remember_token' => \Illuminate\Support\Str::random(10),
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');

    }

    public function forgot(): View
    {
        return view('Forgot');
    }

    public function sendOTP(): View
    {
        return view('SendOTP');
    }

    public function ResetPassword(): View
    {
        return view('ResetPassword');
    }
}
