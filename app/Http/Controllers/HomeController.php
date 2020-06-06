<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB, Session,Cart;
class HomeController extends Controller{
    public function index(){
        return view('users.home');
    }

    public function locate(Request $request){
        Session::put('idprovince',$request->id_province);
        return redirect()->back();
    }
}
