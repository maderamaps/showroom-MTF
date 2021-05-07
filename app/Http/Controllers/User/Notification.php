<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\reward;
use Auth;

class Notification extends Controller
{
    public function notification(){
        $transaksi = transaksi::Select ('no_transaksi as nomer','created_at')
                                ->where('id_user', '=', Auth::user()->id)
                                ->where('notification', '=', 'write')
                                ->addSelect(transaksi::raw("'transaksi' as type"));
                                

        $withdraw = reward::Select ('reward.nominal as nomer','reward.created_at')
                                ->join('transaksi','transaksi.id', '=', 'reward.id_transaksi')
                                ->where('transaksi.id_user', '=', Auth::user()->id)
                                ->where('reward.status', '=', 'withdraw confirmed')
                                ->where('reward.notification', '=', 'write')
                                ->addSelect(reward::raw("'withdraw' as type"))
                                ->union($transaksi);

        $reward = reward::Select ('reward.nominal as nomer','reward.created_at')
                                ->join('transaksi','transaksi.id', '=', 'reward.id_transaksi')
                                ->where('transaksi.id_user', '=', Auth::user()->id)
                                ->where('reward.status', '=', 'reward')
                                ->where('reward.notification', '=', 'write')
                                ->addSelect(reward::raw("'reward' as type"))
                                ->union($withdraw)
                                ->orderBy("created_at","desc")
                                ->get();
        return json_encode($reward);
    }

    public function userNotificationTransaksiUpdate(){
        $transaksi = transaksi::where('notification','write')
                                ->update(['notification'=>'read']);
        return json_encode(['success' => true]);
    }

    public function userNotificationRewardUpdate(){
        $reward = Reward::where('notification','write')
                                ->update(['notification'=>'read']);
        return json_encode(['success' => true]);
    }
}
