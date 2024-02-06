<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Built-in User Authentication */
use Validator;
use Auth;

/* Linked the Model for Data Retrieval */
use App\Models\ISModel;

class MainController extends Controller {

    function index() {
        
        return view('login');
    }
    
    function checklogin(Request $request) {

        $this->validate($request, [
          'email'   => 'required|email',
          'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
          'email'  => $request->get('email'),
          'password' => $request->get('password')
        );

        if(Auth::attempt($user_data)) {

            //return redirect('main/successlogin');

            $role_id = Auth::user()->role_id;

            if($role_id=='1'){

                return redirect('main/administrator');
            }
            else if($role_id=='2'){

                return redirect('main/tabulator');
            }
            else if($role_id=='3'){
                
                return redirect('main/judge');
            }
        }
     
        else {

            return back()->with('error', 'Wrong Login Details');
        }

    }

    function administrator(){

        $role = ISModel::retrieveRole();
    
        //return view('administrator');

        return view('administrator', compact('role'));

    }

    function tabulator(){

        return view('tabulator');
    }

    function judge(){

        return view('judge');
    }


    function successlogin() {

        //return view('successlogin');

        /* Retrieved Role */
        $role = ISModel::retrieveRole();

        //return view('successlogin', compact('role'));

        return view('admin');
    }

    function logout() {

        Auth::logout();
        return redirect('main');
    }

    function try_hash(){

        $hash = PASSWORD_HASH('123456789', PASSWORD_DEFAULT);

        echo $hash;
    }
}
