<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApproveReward extends Controller
{
    public function index()
    {
        $active = "Approve Reward";
        return view('admin/approveReward', ['active' => $active]);
    }
}
