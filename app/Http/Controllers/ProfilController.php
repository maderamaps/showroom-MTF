<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $active = "Profil";
        return view('home', ['active' => $active]);
    }
}
