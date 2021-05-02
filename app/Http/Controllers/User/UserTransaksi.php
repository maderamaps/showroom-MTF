<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
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
            $dataPelanggan = array('name' => $namaCustomer, "phone" => $noTelp, "email" => $email, "address" => $alamatCustomer);
            // $pelanggan = pelanggan::insert($dataPelanggan);
            
            $dataTransaksi = array("id_user" => 24, "id_pelanggan" => 1, "no_transaksi" => $noTransaksi, "status" => "delay", "nominal" => $nominal);
            $transaksi = new Transaksi;
            $transaksi = Transaksi::insert($dataTransaksi);
            $pelanggan = $transaksi->Pelanggan()->create($dataPelanggan);

            //It will automatically fills the user_id in the xyz table. //last code here


            // $value = Aktifitas::insert($data);
            // if ($value) {
            //     echo json_encode(['success' => true]);
            // } else {
            //     echo json_encode(['success' => false]);
            // }
        } else {
            echo 'Fill all fields.';
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
