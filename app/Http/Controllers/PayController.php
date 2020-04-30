<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Session;
use Illuminate\Support\Facades\Redirect;

class PayController extends Controller
{
    public function noteDetail(){

        $customerInformation = DB::table('customer')
            ->where('id_customer',Session::get('id_customer'))
            ->get()
            ->first();

        return view('users.pay.noteDetail')->with('customerInformation',$customerInformation);
    }

    public function saveCustomerPayment(Request $request){
        $shipping_email = $request->shipping_email;
        $shipping_name = $request->shipping_name;
        $shipping_address = $request->shipping_address;
        $shipping_phone = $request->shipping_phone;
        $shipping_notes = $request->shipping_notes;
        $payment_option = $request->payment_option;
        $id_customer = $request->id;

        //lưu vào database

        //
        return view('users.pay.savePayment')
            ->with('shipping_email',$shipping_email)
            ->with('shipping_name',$shipping_name)
            ->with('shipping_address',$shipping_address)
            ->with('shipping_phone',$shipping_phone)
            ->with('shipping_notes',$shipping_notes)
            ->with('payment_option',$payment_option)
            ->with('id_customer',$id_customer);
    }
}
