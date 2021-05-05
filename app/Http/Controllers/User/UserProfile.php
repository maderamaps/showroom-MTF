<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfile extends Controller
{
    public function index()
    {
        $active = "Profile";
        return view('user/profile', ['active' => $active]);
    }
}
