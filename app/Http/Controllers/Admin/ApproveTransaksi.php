<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;

class ApproveTransaksi extends Controller
{
    public function index()
    {
        $active = "Approve Transaksi";
        return view('admin/approveTransaksi', ['active' => $active]);
    }

    public function getDataAll()
    {
        $Transaksi = Transaksi::where('status', '=', 'delay')->with('user:id,name')->get();
        return json_encode($Transaksi);
    }

    public function edit(Request $request)
    {
        $Transaksi = Transaksi::find($request->id);
        $Transaksi->status= 'confirmed';
        $Transaksi->notification= 'write';
        if($Transaksi->save()){
            $user = User::find($request->id_user);
            $user->point = (floatval($Transaksi->nominal) * 1/100) + floatval($user->point);
            $user->save();

            return json_encode(['success'=>true]);
        }else{
            return json_encode(['success'=>false]);
        }
      
    }

    public function delete(Request $request)
    {
        $Transaksi = Transaksi::findOrFail($request->id);
        $Transaksi->status= 'decline';
        if( $Transaksi->save()){
            return json_encode(['success'=>true]);
        }else{
            return json_encode(['success'=>false]);
        }
        exit;
    }

    public function getDataSearch(request $request)
    {
        $Transaksi = Transaksi::with('user:id,name')->
                            where([
                            ['no_transaksi', 'LIKE', '%'.$request->name.'%'], 
                            ['status', 'LIKE', 'delay']
                            ])->get();
        return json_encode($Transaksi);
    }
    
}
