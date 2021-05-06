<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Events\ApproveTransaksi;
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
        $i = 0;
        while(Transaksi::whereno_transaksi($noTransaksi)->exists())
            {
                $i++;
                return response()->json([
                    'message' => 'no transaksi sudah pernah di input'], 404);
            }
        if ($noTransaksi != '' && $nominal != '' && $namaCustomer != '' && $noTelp != '' && $email != '' && $alamatCustomer != '') {
            
            $dataTransaksi = array("id_user" => 24, "no_transaksi" => $noTransaksi, "status" => "delay", "nominal" => $nominal);
            $transaksi = new Transaksi;
            $transaksi->id_user = Auth::user()->id;
            $transaksi->no_transaksi = $noTransaksi;
            $transaksi->status = "delay";
            $transaksi->nominal = $nominal;
            $transaksi->name = $namaCustomer;
            $transaksi->phone = $noTelp;
            $transaksi->email = $email;
            $transaksi->address = $alamatCustomer;
            if ($transaksi->save()) {
                event(new ApproveTransaksi('broadcast'));
                echo json_encode(['success' => true]);
            }else{
                return response()->json([
                    'message' => 'Data tidak tersimpan dikarenakan suatu masalah. Coba lagi!'], 404);
            }
            // if ($transaksi->save()) {
            //     if($transaksi->no_transaksi==$noTransaksi){
            //         $pelanggan = new Pelanggan;
            //         $pelanggan->name = $namaCustomer;
            //         $pelanggan->id_transaksi = $transaksi->id;
            //         $pelanggan->phone = $noTelp;
            //         $pelanggan->email = $email;
            //         $pelanggan->address = $alamatCustomer;
            //         $pelanggan->save();
            //         echo json_encode(['success' => true]);
                // }else{
                //     Transaksi::deleteData($transaksi->id);
                //     return response()->json([
                //         'message' => 'Data tidak tersimpan dikarenakan suatu masalah. Coba lagi!'], 404);
                // }
                
            // }else{
            //     return response()->json([
            //         'message' => 'Data tidak tersimpan. Coba lagi!'], 404);
            // }
        } else {
            return response()->json([
                'message' => 'Fill all fields'], 404);
        }

        exit;
    }

    public function show(){
        $transaksi = Transaksi::where('id_user', '=', Auth::user()->id)->orderBy('created_at','desc')->paginate(20);
        $active = "Transaksi";
        return view('user/historyTransaksi', ['active' => $active,
                                              'transaksi' => $transaksi]);
    }

    public function search(request $request){
        if($request->search==""){
            return $this->show();
        }
        $transaksi = Transaksi::where('id_user', '=', Auth::user()->id)
                                ->where('no_transaksi','=',$request->search)
                                // ->orwhere('created_at','=',$request->search)
                                // ->orwhere('name','=',$request->search)
                                // ->orwhere('phone','=',$request->search)
                                // ->orwhere('email','=',$request->search)
                                // ->orwhere('address','=',$request->search)
                                // ->orwhere('nominal','=',$request->search)
                                // ->where('status','=',$request->search)
                                ->orderBy('created_at','desc')
                                ->paginate(20);
        $active = "Transaksi";
        return view('user/historyTransaksi', ['active' => $active,
                                              'transaksi' => $transaksi]);
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
