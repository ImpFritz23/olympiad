<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    function register(Request $req) {

        //return "Hello";
        $user = new User();
        $user -> name=$req->input('name'); 
        $user -> email=$req->input('email'); 
        $user -> password= Hash::make($req->input('password'));

        $user->save();
        return $user;
        //return $req->input();
    }
}
