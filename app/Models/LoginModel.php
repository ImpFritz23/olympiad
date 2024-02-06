<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoginModel extends Model {

    use HasFactory;

    public function TestLogin($request){

        //$username = $request->input('username');
        //$passwordx = $request->input('passwordx');
       
        $username = "fritz";
        $passwordx = "fritz";
       
        $result = DB::select('SELECT * FROM userx WHERE username = ? AND passwordx = ?', [$username, $passwordx]);

        //$result = DB::select('SELECT * FROM userx WHERE username = ? AND passwordx = ?', [$username, $passwordx]);

        return $result;
        
    }

    public function scopeLoginUser($request){

        //$username = $request->input('username');
        //$passwordx = $request->input('passwordx');

        $username = "fritz";
        $passwordx = "fritz";

        //$result = DB::select('SELECT * FROM user');
        
        $result = DB::select('SELECT * FROM userx WHERE username = ? AND passwordx = ?', [$username, $passwordx]);

       

        return $result;
    }
}
