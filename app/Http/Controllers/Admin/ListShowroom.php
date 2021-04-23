<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ListShowroom extends Controller
{
    public function index()
    {
        $active = "List Showroom";
        return view('admin/ListShowroom', ['active' => $active]);
    }

    public function getDataUser()
    {
        $User = User::findOrFail($request->id);
        return json_encode($User);
    }

    public function getDataAll()
    {
        $User = User::where('status', '=', 'confirmed')->get();
        return json_encode($User);
    }

    public function getDataSearch(request $request)
    {
        $User = User::where([
                            ['name', 'LIKE', '%'.$request->name.'%'], 
                            ['status', 'LIKE', 'confirmed']
                            ])->get();
        return json_encode($User);
    }
}
