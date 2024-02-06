<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Flight;

class FlightController extends Controller {

    public function user_data(){

        $user = Flight::RetrieveUser();
             
        return response()->json($user);

    }

    public function flight_view(){

        return view('flight');
    }
}
