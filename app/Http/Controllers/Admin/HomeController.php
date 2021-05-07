<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Reward;


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
        $transaksi = transaksi::where('status', '=', 'delay')->count();
        return json_encode($transaksi);
    }

    public function notificationWithdraw(){
        $withdraw = Reward::where('status', '=', 'withdraw')->count();
        return json_encode($withdraw);
    }

    public function notificationRegister(){
        $user = User::where('status', '=', 'delay')->count();
        return json_encode($user);
    }
}
