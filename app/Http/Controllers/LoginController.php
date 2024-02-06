<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\LoginModel;

class LoginController extends Controller {
    
    public function v_login(){

        return view('v_login');
    }

    public function test_login(Request $request){

        //echo "Controller";

        $result = new LoginModel();
        $result->TestLogin($request);
        return response()->json($result);
    }

    public function test_login_2(Request $request){

        $user = LoginModel::LoginUser();
        //return response()->json($user);

        return view('v_main');

        //echo "tttt";
    }
}
