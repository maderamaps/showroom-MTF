<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class UserProfile extends Controller
{
    public function index()
    {
        $active = "Profile";
        return view('user/profile', ['active' => $active]);
    }

    public function show()
    {
        $user = User::select('name','email','phone','address','owner_name','owner_email','owner_phone','owner_address','ktp_number','avatar')
                            ->where('id',Auth::user()->id)
                            ->get();
        return json_encode($user);
    }

    public function update(Request $request)
    {
        try {
            $user = User::where('id',Auth::user()->id)
                    ->update(['name' => $request->name,
                              'phone' => $request->phone,
                              'email' => $request->email,
                              'address' => $request->address,
                              'owner_name' => $request->ownerName,
                              'owner_phone' => $request->ownerPhone,
                              'owner_email' => $request->ownerEmail,
                              'owner_address' => $request->ownerAddress
                            ]);
            return json_encode(['success' => true]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Data tidak tersimpan dikarenakan suatu masalah.'], 404);
        }
        
    }

    public function updateAvatar(Request $request)
    {
     
            $file = $request->avatar;
            $imagedata = file_get_contents($file->getRealPath());
            $base64ktp = base64_encode($imagedata);
            $user = User::where('id',Auth::user()->id)
                    ->update(['avatar' => $base64ktp]);
            $active = "Profile";
            return redirect()->route('ProfileUser');
            
    
    }
}
