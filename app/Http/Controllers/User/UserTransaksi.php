<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use Auth;
use Carbon\Carbon;

class UserTransaksi extends Controller
{
    public function index(){
        $active = "Transaksi";
        return view('user/inputTransaksi', ['active' => $active]);
    }

    public function store(Request $request){
        $noTransaksi = $request->input('noTransaksi');
        $nominal = $request->input('nominal');
        $namaCustomer = $request->input('namaCustomer');
        $noTelp = $request->input('noTelp');
        $email = $request->input('email');
        $alamatCustomer = $request->input('alamatCustomer');

        if ($noTransaksi != '' && $nominal != '' && $namaCustomer != '' && $noTelp != '' && $email != '' && $alamatCustomer != '') {
            
            $dataTransaksi = array("id_user" => 24, "no_transaksi" => $noTransaksi, "status" => "delay", "nominal" => $nominal);
            $transaksi = new Transaksi;
            $transaksi->id_user = Auth::user()->id;
            $transaksi->no_transaksi = $noTransaksi;
            $transaksi->status = "delay";
            $transaksi->nominal = $nominal;
            if ($transaksi->save()) {
                if($transaksi->no_transaksi==$noTransaksi){
                    $pelanggan = new Pelanggan;
                    $pelanggan->name = $namaCustomer;
                    $pelanggan->id_transaksi = $transaksi->id;
                    $pelanggan->phone = $noTelp;
                    $pelanggan->email = $email;
                    $pelanggan->address = $alamatCustomer;
                    $pelanggan->save();
                    echo json_encode(['success' => true]);
                }else{
                    Transaksi::deleteData($transaksi->id);
                    echo json_encode(['success' => false]);
                }
                
            }else{
                echo json_encode(['success' => false]);
            }

            // $value = Aktifitas::insert($data);
            // if ($value) {
            //     echo json_encode(['success' => true]);
            // } else {
            //     echo json_encode(['success' => false]);
            // }
        } else {
            return response()->json([
                'message' => 'Fill all fields'], 404);
        }

        exit;
    }

    public function chart(){
        $currentYear = date("m");
        $Transaksi = Transaksi::where('id_user', '=', Auth::user()->id)
                            ->where('status', '=', 'confirmed')
                            ->whereYear('created_at', Carbon::now()->year)
                            ->orderBy('created_at', 'ASC')
                            ->get(['id','created_at']);
        return json_encode($Transaksi);
    }

    public function recent(){
        $Transaksi = Transaksi::where('id_user', '=', Auth::user()->id)
                                ->orderBy('created_at', 'desc')->take(5)->get();
        return json_encode($Transaksi);
    }
}
