<?php

use App\Models\ISFEModel

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
//use App\ISFEModel;

class ISFEController extends Controller{
    
    public function index(){

        echo "Inside Index Method";
    }

    public function about(){

        return view('about');
    }

    public function contact(){

        return view('contact');
    }

    public function user_data(){

        $user = ISFEModel::RetrieveUser();
         
        return response()->json($user);

        //echo "User Data";
    }
}
