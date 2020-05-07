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
        $isAdmin = $request->isAdmin;
        if(!$isAdmin) { //nếu ko phải admin
            $resultUser = DB::table('customer')->where('email', $email)->where('password', $password)->first();
            if($resultUser){    //nếu người dùng đăng nhập đúng
                Session::put('login', true);
                Session::put('id_customer',$resultUser->id_customer);
                // Session::put('name',$resultUser->name);
                Session::remove('id_admin');
                return view('users.home');
            } else{
                return Redirect::to('/login');
            }
        }
        else { //nếu là admin
            $resultAdmin = DB::table('admininfo')->where('email', $email)->where('password', $password)->first();
            if($resultAdmin){   //nếu admin đăng nhập đúng
                Session::put('id_admin',$resultAdmin->id_admin);
                Session::remove('id_customer');
                return view('users.home');
            } else{
                return Redirect::to('/login')->with('fail', 'Đăng nhập không thành công, sai username hoặc password.');
            }
        }
    }

    public function login(){
        return view('users.login');
    }

    public function logout(){
        if(Session::get('id_customer')) {
            Session::forget('login');
            Session::forget('id_customer');
            return redirect('login');
        }
        else return redirect('/');
    }

}
