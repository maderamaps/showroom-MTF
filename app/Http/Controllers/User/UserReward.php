<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reward;
use App\Models\User;
use App\Models\Transaksi;
use Auth;


class UserReward extends Controller
{
    public function index(){
        $reward = Reward::select('reward.id','reward.nominal','reward.created_at','reward.status','reward.id_transaksi','transaksi.no_transaksi','transaksi.name')
                        ->join('transaksi', 'transaksi.id', '=', 'reward.id_transaksi')
                        ->where('transaksi.id_user',  Auth::user()->id)
                        ->orderBy('created_at','desc')
                        ->paginate(10);

        $point = Auth::user()->point;
        $active = "Reward";
        return view('user/reward', ['active' => $active,
                                    'reward' => $reward,
                                    'point' => $point]);
    }

    // public function getAll(){
        
    // }

    public function withdraw(Request $request){
        try {
            if(Auth::user()->point >= $request->inputWithdraw){
                $transaksi = Transaksi::select('id')
                        ->where("id_user", Auth::user()->id)
                        ->take(1)
                        ->get();

                $reward = new Reward;
                $reward->id_transaksi = $transaksi[0]->id;
                $reward->nominal = $request->inputWithdraw;
                $reward->status = "withdraw";
                if ($reward->save()) {
                    $point= floatval(Auth::user()->point) - floatval($request->inputWithdraw);
                    $user = User::where('id',Auth::user()->id)
                        ->update(['point' => $point]);
                    return redirect()->route('RewardUser');
                }
                return redirect()->route('RewardUser'); 
            }else{
                return redirect()->route('RewardUser');
            }
            
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('RewardUser');
        }
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
