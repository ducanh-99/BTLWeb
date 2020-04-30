<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB,Session;
class LoginController extends Controller
{
    public function login_check(Request $request){
        $email = $request->email_account;
        $password = $request->password_account;
        $result = DB::table('customer')->where('email',$email)->where('password',$password)->first();


        if($result){
            Session::put('id_customer',$result->id_customer);
            return Redirect::to('/login-successful');
        }else{
            return Redirect::to('/login-failed');
        }
    }

    public function loginSuccessful(){
        return view('users.home');
    }

    public function loginFailed(){
        return view('users.login');
    }

    public function login(){
        return view('users.login');
    }
}
