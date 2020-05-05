<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session,DB,Cart;
class UserController extends Controller
{
    public function displayUser(){
        $allUser = DB::table('customer')
            ->get();
        return view('admin.userManagement.view_all_users')->with('allUser',$allUser);
    }

    public function blockUser($id_customer){
        DB::table('customer')
            ->where('id_customer',$id_customer)
            ->update(['status'=>0]);
        return back();
    }

    public function unBlockUser($id_customer){
        DB::table('customer')
            ->where('id_customer',$id_customer)
            ->update(['status'=>1]);
        return back();
    }

    public function deleteComment($id_comment){
        DB::table('coment')
            ->where('id_coment',$id_comment)
            ->delete();
        return back();
    }
}
