<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\User;

class RegisterConfirmController extends Controller
{
    public function index()
    {
        $active = "Register Confirm";
        return view('admin/home', ['active' => $active]);
    }

    public function getDataUser(Request $request)
    {
        $User = User::findOrFail($request->id);
        return json_encode($User);
    }

    public function edit(Request $request)
    {
        $User = User::find($request->id);
        $User->status= 'confirmed';
        if($User->save()){
            return json_encode(['success'=>true]);
        }else{
            return json_encode(['success'=>false]);
        }
      
    }

    public function deleteUser(Request $request)
    {
        $User = User::findOrFail($request->id);
        if($aktifitas->delete()){
            return json_encode(['success'=>true]);
        }else{
            return json_encode(['success'=>false]);
        }
        exit;
    }
}
