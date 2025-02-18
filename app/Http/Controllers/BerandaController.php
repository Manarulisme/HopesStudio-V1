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

    public function forgot(): View
    {
        return view('Forgot');
    }

    public function sendOTP(): View
    {
        return view('SendOTP');
    }
}
