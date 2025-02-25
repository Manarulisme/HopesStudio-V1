<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function userIndex()
    {
        return view('UserPage.DashboardPage');
    }
    public function adminIndex()
    {
        return view('dashboard'); // Breeze dashboard view
    }
}
