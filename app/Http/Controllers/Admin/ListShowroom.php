<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListShowroom extends Controller
{
    public function index()
    {
        $active = "List Showroom";
        return view('admin/ListShowroom', ['active' => $active]);
    }
}
