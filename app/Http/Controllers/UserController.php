<?php

namespace App\Http\Controllers;

use App\Models\UserInxait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get_all_users()
    {
        $data = [];
        $data['users'] = UserInxait::all();
        $data['count'] = count($data['users']);
        return view('home.index')->with("data", $data);
    }

    public function create_user(Request $request)
    {
        UserInxait::validate($request);
        $input = $request->All();
        
        if($input["habeasData"]=="ok"){
            $input["habeasData"] = true;
        }
        //dd($input);
        UserInxait::create($input);
        
        return back();
    }
}
