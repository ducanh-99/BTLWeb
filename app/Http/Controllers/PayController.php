<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Session,Cart;
use Illuminate\Support\Facades\Redirect;

class PayController extends Controller
{
    public function noteDetail()
    {

        $customerInformation = DB::table('customer')
            ->where('id_customer', Session::get('id_customer'))
            ->get()
            ->first();

        return view('users.pay.noteDetail')->with('customerInformation', $customerInformation);
    }

    public function saveCustomerPayment(Request $request)
    {
        $shipping_email = $request->shipping_email;
        $shipping_name = $request->shipping_name;
        $shipping_address = $request->shipping_address;
        $shipping_phone = $request->shipping_phone;
        $shipping_notes = $request->shipping_notes;
        $payment_option = $request->payment_option;
        $id_customer = $request->id_customer;

        //lưu vào database.order
        DB::table('oder')
            ->insert(['id_customer' => $id_customer,'date' => date('Y-m-d H:i:s'), 'isapproved'=>0,'note'=>$shipping_notes]);
        //lưu vào database.order_detail
        $id_oder = DB::table('oder')
            ->get()->last();
        $id_oder = $id_oder->id_oder;

        $content = Cart::content();
        $i = 1;
        foreach($content as $eachContentItem) {
            DB::table('oder_detail')
                ->insert(['item_order' => $i, 'id_oder' => $id_oder,'id_product' => $eachContentItem->id,
                    'quantity' => $eachContentItem->qty,'discount' => Cart::discount(),'months' => 12]);
            $i++;
        }
        //
        return view('users.pay.savePayment')
            ->with('shipping_email', $shipping_email)
            ->with('shipping_name', $shipping_name)
            ->with('shipping_address', $shipping_address)
            ->with('shipping_phone', $shipping_phone)
            ->with('shipping_notes', $shipping_notes)
            ->with('payment_option', $payment_option)
            ->with('id_customer', $id_customer);
    }
}
