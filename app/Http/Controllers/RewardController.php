<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function index()
    {
        $active = "Reward";
        return view('home', ['active' => $active]);
    }
}
