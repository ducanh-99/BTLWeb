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
            $check = $resultUser;
            if($check){    //nếu người dùng đăng nhập đúng
                Session::put('login', true);
                Session::put('id_customer',$resultUser->id_customer);
                Session::remove('id_admin');
                if($resultUser->isprovider == 1){
                    Session::put('id_lease',$resultUser->id_customer);
                }
                return view('users.home');
            } else{
                $alert = 'Wrong password. Try again or click Forgot password to reset it.';
                return view('users.login', compact('check', 'alert'));
            }
        }
        else { //nếu là admin
            $resultAdmin = DB::table('admininfo')->where('email', $email)->where('password', $password)->first();
            $check = $resultAdmin;
            if($check){   //nếu admin đăng nhập đúng
                Session::put('login', true);
                Session::put('id_admin',$resultAdmin->id_admin);
                Session::remove('id_customer');
                return view('admin.welcomeAdmin');
            } else{
                $alert = 'Wrong password. Try again or click Forgot password to reset it.';
                return view('users.login', compact('check', 'alert'));
            }
        }
    }

    public function login(){
        return view('users.login');
    }

    public function logout(){
        if(Session::get('id_customer') || Session::get('id_admin')) {
            Session::put('login', false);
            Session::remove('id_customer');
            Session::remove('id_admin');
           // Session::remove('id_lease');
            return redirect('login');
        }
        else return redirect('/');
    }

    public function welcomeAdmin(){
        if (Session::get('id_admin')){
            return view('admin.welcomeAdmin');
        } else {
            return redirect('login');
        }
    }
}
