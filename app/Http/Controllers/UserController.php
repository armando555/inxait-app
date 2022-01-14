<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\UserInxait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get_all_users()
    {
        $token = "kUu8tWVjwUZsdISLGNb4S2MB42VEktSOs3r7CapLX5_2UmBZeS7dHli81ROAJtIatJs";
        $response = Http::withHeaders([
            "Accept"=> "application/json",
            "api-token"=> $token,
            "user-email"=> "armandosebas4@gmail.com"
        ])->get('https://www.universal-tutorial.com/api/getaccesstoken');
        $this->tokenAuth = $response->json('auth_token');
        $countries = Http::withHeaders([
            "Authorization"=> "Bearer ".$this->tokenAuth,
            "Accept"=> "application/json"
        ])->get("https://www.universal-tutorial.com/api/countries/");
        $data = [];
        $data['users'] = UserInxait::all();
        $data['count'] = count($data['users']);
        $data['states'] = $this->getStates();
        return view('home.index')->with("data", $data);
    }

    public function getStates(){
        $states = Http::withHeaders([
            "Authorization"=> "Bearer ".$this->tokenAuth,
            "Accept"=> "application/json"
        ])->get("https://www.universal-tutorial.com/api/states/Colombia");
        $cities = Http::withHeaders([
            "Authorization"=> "Bearer ".$this->tokenAuth,
            "Accept"=> "application/json"
        ])->get("https://www.universal-tutorial.com/api/cities/Antioquia");
        //dd($cities->json());
        return $states->json();
    }
    public function cities(Request $request){
        //dd($request);
        if(isset($request->texto)){
            $cities = Http::withHeaders([
                "Authorization"=> "Bearer ".$this->tokenAuth,
                "Accept"=> "application/json"
            ])->get("https://www.universal-tutorial.com/api/cities/$request->texto");
            $citiesN = $cities->json();
            return response()->json(
                [
                    'lista' => $citiesN,
                    'success' => true
                ]                
            );
        }else{
            return response()->json(
                [
                    'success' => false,
                    'objeto' => $request
                ]                
            );
        }
        
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
