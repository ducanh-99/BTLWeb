<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session, DB, Cart;

class UserController extends Controller
{
    public function displayUser()
    {
        if (Session::get('id_admin')) {
                $allUser = DB::table('customer')
                    ->where('isprovider',0)
                    ->get();
            $allLease = DB::table('customer')
                ->where('isprovider',1)
                ->get();
            return view('admin.userManagement.view_all_users')->with('allUser', $allUser)->with('allLease',$allLease);
        } else {
            return redirect('login');
        }
    }

    public function blockUser($id_customer)
    {
        if (Session::get('id_admin')) {
            DB::table('customer')
                ->where('id_customer', $id_customer)
                ->update(['status' => 0]);
            return back();
        } else {
            return redirect('login');
        }
    }

    public function unBlockUser($id_customer)
    {
        if (Session::get('id_admin')) {
            DB::table('customer')
                ->where('id_customer', $id_customer)
                ->update(['status' => 1]);
            return back();
        } else {
            return redirect('login');
        }
    }
    public function makeProvider($id_customer)
    {
        if (Session::get('id_admin')) {
            DB::table('customer')
                ->where('id_customer', $id_customer)
                ->update(['isprovider' => 1]);
            return redirect('display-user');
        } else {
            return redirect('login');
        }
    }

    public function unmakeProvider($id_customer)
    {
        if (Session::get('id_admin')) {
            DB::table('customer')
                ->where('id_customer', $id_customer)
                ->update(['isprovider' => 0]);
            return redirect('display-user');
        } else {
            return redirect('login');
        }
    }

    public function deleteComment($id_comment)
    {
        if (Session::get('id_admin')) {
            DB::table('coment')
                ->where('id_coment', $id_comment)
                ->delete();
            return back();
        } else {
            return redirect('login');
        }
    }
}
