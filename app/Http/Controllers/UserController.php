<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\UserInxait;
use App\Exports\UsersInxaitExport;
use App\Exports\WinnersExport;
use App\Models\Winner;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function get_all_users()
    {
        $token = "kUu8tWVjwUZsdISLGNb4S2MB42VEktSOs3r7CapLX5_2UmBZeS7dHli81ROAJtIatJs";
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "api-token" => $token,
            "user-email" => "armandosebas4@gmail.com"
        ])->get('https://www.universal-tutorial.com/api/getaccesstoken');
        $this->tokenAuth = $response->json('auth_token');
        $countries = Http::withHeaders([
            "Authorization" => "Bearer " . $this->tokenAuth,
            "Accept" => "application/json"
        ])->get("https://www.universal-tutorial.com/api/countries/");
        $data = [];
        $data['users'] = UserInxait::all();
        $data['count'] = count($data['users']);
        $data['states'] = $this->getStates();
        $data['winner'] = $this->choose_winner();
        return view('home.index')->with("data", $data);
    }

    public function getStates()
    {
        $states = Http::withHeaders([
            "Authorization" => "Bearer " . $this->tokenAuth,
            "Accept" => "application/json"
        ])->get("https://www.universal-tutorial.com/api/states/Colombia");
        $cities = Http::withHeaders([
            "Authorization" => "Bearer " . $this->tokenAuth,
            "Accept" => "application/json"
        ])->get("https://www.universal-tutorial.com/api/cities/Antioquia");
        //dd($cities->json());
        return $states->json();
    }
    public function cities(Request $request)
    {
        //dd($request);
        $token = "kUu8tWVjwUZsdISLGNb4S2MB42VEktSOs3r7CapLX5_2UmBZeS7dHli81ROAJtIatJs";
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "api-token" => $token,
            "user-email" => "armandosebas4@gmail.com"
        ])->get('https://www.universal-tutorial.com/api/getaccesstoken');
        $this->tokenAuth = $response->json('auth_token');
        if (isset($request->texto)) {
            $cities = Http::withHeaders([
                "Authorization" => "Bearer " . $this->tokenAuth,
                "Accept" => "application/json"
            ])->get("https://www.universal-tutorial.com/api/cities/$request->texto");
            $citiesN = $cities->json();
            return response()->json(
                [
                    'lista' => $citiesN,
                    'success' => true
                ]
            );
        } else {
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

        if ($input["habeasData"] == "ok") {
            $input["habeasData"] = true;
        }
        //dd($input);
        UserInxait::create($input);

        return back();
    }

    public function choose_winner()
    {

        $users = UserInxait::all();
        $length = count($users);
        if ($length >= 5 ) {
            $random = rand(0, $length - 1);
            //dd($users[$random]->getName());
            $id = $users[$random]->getId();
            DB::insert('insert into winners (user_inxait_id) values (?)',[$id]);
            return $users[$random];
        }else{
            return "no hay usuarios";
        }
    }

    public function export_excel(){
        return Excel::download(new UsersInxaitExport, 'users.xlsx');
    }
    public function export_excel_winners(){
        return Excel::download(new WinnersExport, 'winners.xlsx');
    }
}
