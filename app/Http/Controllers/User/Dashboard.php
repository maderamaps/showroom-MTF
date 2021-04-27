<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $active = "Dashboard";
        return view('user/dashboard', ['active' => $active]);
    }
}
