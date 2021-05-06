<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $active = "Dashboard";
        return view('admin/home', ['active' => $active]);
    }

    public function notificationTransaksi(){
        $transaksi = transaksi::where('notification', '=', null)->count();
        return json_encode($transaksi);
    }
}
