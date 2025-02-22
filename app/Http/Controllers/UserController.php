<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Profil(): View
    {
        return view('UserPage.ProfilPage');
    }

    public function SuntingProfil(): View
    {
        return view('UserPage.SuntingProfilPage');
    }
}
