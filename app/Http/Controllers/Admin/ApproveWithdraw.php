<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reward;


class ApproveWithdraw extends Controller
{
    public function index()
    {
        $active = "Approve Withdraw";
        return view('admin/approveWithdraw', ['active' => $active]);
    }

    public function getDataAll()
    {
        $Reward = Reward::select('reward.id','reward.nominal','reward.created_at','reward.id_transaksi','transaksi.no_transaksi','transaksi.id_user','users.name')
                    ->join('transaksi', 'transaksi.id', '=', 'reward.id_transaksi')
                    ->join('users', 'users.id', '=', 'transaksi.id_user')
                    ->where('reward.status', 'withdraw')
                    ->get();

        // $Reward = Reward::where('status', '=', 'withdraw')->with('transaksi')->get();
        return json_encode($Reward);
    }

    public function edit(Request $request)
    {
        $Reward = Reward::find($request->id);
        $Reward->status= 'withdraw confirmed';
        if($Reward->save()){
            return json_encode(['success'=>true]);
        }else{
            return json_encode(['success'=>false]);
        }
      
    }

    public function delete(Request $request)
    {
        $Reward = Reward::find($request->id);
        $Reward->status= 'reward';
        if($Reward->save()){
            return json_encode(['success'=>true]);
        }else{
            return json_encode(['success'=>false]);
        }
    }
}
