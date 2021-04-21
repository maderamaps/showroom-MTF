<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function index()
    {
        $active = "Reward";
        return view('home', ['active' => $active]);
    }
}
