<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $active = "Dashboard";
        return view('admin/home', ['active' => $active]);
    }
}
