<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reward;
use Auth;


class UserReward extends Controller
{
    public function index(){
        $reward = Reward::select('reward.id','reward.nominal','reward.created_at','reward.status','reward.id_transaksi','transaksi.no_transaksi','transaksi.name')
                        ->join('transaksi', 'transaksi.id', '=', 'reward.id_transaksi')
                        ->where('transaksi.id_user',  Auth::user()->id)
                        ->orderBy('created_at','desc')
                        ->paginate(20);

        $active = "Reward";
        return view('user/reward', ['active' => $active,
                                    'reward' => $reward]);
    }

    public function getAll(){
        
    }

    public function recent(){
        $Reward = Reward::select('reward.nominal','reward.created_at','transaksi.name')
                            ->join('transaksi', 'transaksi.id', '=', 'reward.id_transaksi')                   
                            // ->join('users', 'users.id', '=', 'transaksi.id_user')
                            ->where('transaksi.id_user', Auth::user()->id)
                            ->where('reward.status', 'reward')
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();
        return json_encode($Reward);
    }

    public function recentWithdraw(){
        $Reward = Reward::select('reward.nominal','reward.created_at','transaksi.name')
                            ->join('transaksi', 'transaksi.id', '=', 'reward.id_transaksi')                   
                            ->where('transaksi.id_user', Auth::user()->id)
                            ->where('reward.status', 'withdraw confirmed')
                            ->orderBy('reward.created_at', 'desc')
                            ->take(5)
                            ->get();
        return json_encode($Reward);
    }
}
