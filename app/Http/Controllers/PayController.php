<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Session, Cart, Math;
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
        $shipping_province = $request->shipping_province;
        $id_partner_delivery = $request->partner_delivery;
        $shipping_method = $request->shipping_method;   //0: ship chiều đi, 1: ship chiều về, 2: ship 2 chiều


        $month = array();


        $content = Cart::content();
        $numberOfItems = 0;
        foreach ($content as $eachItem) {
            $numberOfItems += 1;
            $month[] = $request->months[$numberOfItems];
        }


        $content = Cart::content();
        $totalcost = 0;
        foreach ($content as $eachItem) {
            $totalcost += $eachItem->qty * $eachItem->price;
        }

        //lưu vào database.order
        DB::table('oder')
            ->insert(['id_customer' => $id_customer, 'date' => date('Y-m-d H:i:s'), 'isapproved' => 0, 'note' => $shipping_notes,
                'id_province' => $shipping_province, 'totalcost' => $totalcost]);
        //lưu vào database.order_detail
        $idoder = DB::table('oder')
            ->get()->last();
        $id_oder = $idoder->id_oder;

        $totalcost = 0;
        $i = 1;
        foreach ($content as $eachContentItem) {
            $produc = DB::table('product')->where('id_product',$eachContentItem->id)->get()->first();
            $shipping_fee = 0;
            $src = $produc->id_province;
            $dest = $idoder->id_province;
            $distanceCoefficient = abs(DB::table('province')->where('id_province',$src)->get()->first()->position -
                    DB::table('province')->where('id_province',$dest)->get()->first()->position);
            $fee = DB::table('partner_delivery')->where('id_partner_delivery',$id_partner_delivery)->get()->first();
            if($shipping_method == 0){  //chỉ ship đến
                $shipping_fee = $distanceCoefficient * $fee->shipping_fee;
            } else if($shipping_method == 1){   //chỉ đến lấy hàng
                $shipping_fee = $distanceCoefficient * $fee->return_fee;
            } else if($shipping_method == 2){//cả 2 chiều
                $shipping_fee = $distanceCoefficient * ($fee->return_fee + $fee->shipping_fee);
            }

            $deposit = 1.1 * $produc->market_price;
            DB::table('oder_detail')
                ->insert(['item_order' => $i, 'id_oder' => $id_oder, 'id_product' => $eachContentItem->id,'shipping_fee'=>$shipping_fee,
                    'quantity' => $eachContentItem->qty, 'discount' => Cart::discount(), 'months' => $month[$i - 1], 'id_partner_delivery' => $id_partner_delivery, 'deposit' => $deposit]);
            $i++;
            $totalcost += $shipping_fee + $eachContentItem->qty * $deposit;
        }
        DB::table('oder')
            ->where('id_oder', $id_oder)
            ->update(['totalcost' => $totalcost]);
        //
        return view('users.pay.savePayment')
            ->with('shipping_email', $shipping_email)
            ->with('shipping_name', $shipping_name)
            ->with('shipping_address', $shipping_address)
            ->with('shipping_phone', $shipping_phone)
            ->with('shipping_notes', $shipping_notes)
            ->with('payment_option', $payment_option)
            ->with('id_customer', $id_customer)
            ->with('id_partner_delivery',$id_partner_delivery)
            ->with('shipping_fee',$shipping_fee)
            ->with('totalcost',$totalcost)
            ->with('month', $month);
    }
}
