<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session,DB,Cart;
class OrderController extends Controller
{
    public function viewUserOrderDetail($id_oder){
        if (Session::get('id_customer')) {
            $allUserOrderDetail = DB::table('oder_detail')
                ->where('id_oder', $id_oder)
                ->get();
            return view('users.order.userOrderDetail')->with('allUserOrderDetail', $allUserOrderDetail);
        } else {
            return redirect('login');
        }
    }

    public function viewUserOrder(){
        if (Session::get('id_customer')) {
            $allUserOrder = DB::table('oder')
                ->where('id_customer',Session::get('id_customer'))
                ->get();
            if(empty($allUserOrder)) {
                return view('users.order.userOrder')->with('allUserOrder', $allUserOrder);
            }
            else {
                return view('users.order.notBuyYet');
            }
        } else {
            return redirect('login');
        }
    }

    public function cancelUserOrder($id_oder){
        if (Session::get('id_customer')) {
            $allUserOrder = DB::table('oder')
                ->where('id_oder', $id_oder)
                ->update(['isapproved' => 3]);
            return back();
        } else {
            return redirect('login');
        }
    }
}
