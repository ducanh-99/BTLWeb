<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Session, Cart, Math;
use Illuminate\Support\Facades\Redirect;

class PayController extends Controller
{
    public function previewOrder()
    {
        //cho người dùng chọn số tháng thuê, chọn xong đối tác giao hàng, chọn xong hình thức giao hàng
        return view('users.pay.previewOrder');
    }

    public function noteDetail(Request $request)
    {   //khi người dùng đã chọn xong số tháng thuê, chọn xong đối tác giao hàng, chọn xong hình thức giao hàng
        //trả về thông tin đơn hàng và điền thông tin người nhận hàng
        $customerInformation = DB::table('customer')
            ->where('id_customer', Session::get('id_customer'))
            ->get()
            ->first();

        $dest = $request->shipping_province;

        $month = array();
        $id_partner_delivery = array();
        $shipping_method = array();
        $deposit = array();

        $content = Cart::content();
        $numberOfItems = 0;
        foreach ($content as $eachItem) {
            $month[$numberOfItems] = $request->months[$numberOfItems];
            $id_partner_delivery[$numberOfItems] = $request->partner_delivery[$numberOfItems];
            $shipping_method[$numberOfItems] = $request->shipping_method[$numberOfItems];   //0: ship chiều đi, 1: ship chiều về, 2: ship 2 chiều
            $numberOfItems += 1;
        }

        $shipping_fee = array();    //mỗi mặt hàng trong cart sẽ có phí ship khác nhau
        $totalEachCost = array();   //tổng tiền của mỗi mặt hàng trong giỏ hàng
        $content = Cart::content();
        $totalcost = 0; //tổng tiền của cả cái giỏ hàng
        $i = 1;
        foreach ($content as $eachContentItem) {
            $produc = DB::table('product')->where('id_product', $eachContentItem->id)->get()->first();  //chứa id mặt hàng thứ i trong giỏ hàng
            $shipping_fee[$i - 1] = 0;
            $src = $produc->id_province;
            $distanceCoefficient = abs(DB::table('province')->where('id_province', $src)->get()->first()->position -
                DB::table('province')->where('id_province', $dest)->get()->first()->position);  //tính khoảng cách từ nơi cho thuê đến nơi thuê
            $fee = DB::table('partner_delivery')->where('id_partner_delivery', $id_partner_delivery[$i - 1])->get()->first();   //lấy thông tin đối tác giao hàng
            if ($shipping_method[$i - 1] == 0) {  //chỉ ship đến
                $shipping_fee[$i - 1] = $distanceCoefficient * $fee->shipping_fee;
            } else if ($shipping_method[$i - 1] == 1) {   //chỉ đến lấy hàng
                $shipping_fee[$i - 1] = $distanceCoefficient * $fee->return_fee;
            } else if ($shipping_method[$i - 1] == 2) {//cả 2 chiều
                $shipping_fee[$i - 1] = $distanceCoefficient * ($fee->return_fee + $fee->shipping_fee);
            }   //tính toán xong phí ship

            //tính tiền cọc
            $deposit[$i - 1] = 1.1 * $produc->market_price; //giá thị trường + 10% phí bảo hành

            $totalEachCost[$i - 1] = $shipping_fee[$i - 1] + ($eachContentItem->qty) * $deposit[$i - 1]; //tổng chi phí của 1 mặt hàng trong đơn hàng = tiền cọc + phí ship
            $totalcost += $totalEachCost[$i - 1];
            $i++;
        }

        return view('users.pay.noteDetail')
            ->with('customerInformation', $customerInformation)
            ->with('dest', $dest)
            ->with('month', $month)
            ->with('id_partner_delivery', $id_partner_delivery)
            ->with('shipping_method', $shipping_method)
            ->with('shipping_fee', $shipping_fee)
            ->with('totalcost', $totalcost)
            ->with('totalEachCost', $totalEachCost)
            ->with('deposit', $deposit);
    }


    public function saveCustomerPayment(Request $request)
    {   //sau khi đã xác nhận xong tất cả
        $shipping_email = $request->shipping_email;
        $shipping_name = $request->shipping_name;
        $shipping_address = $request->shipping_address;
        $shipping_phone = $request->shipping_phone;
        $shipping_notes = $request->shipping_notes;
        $payment_option = $request->payment_option;
        $id_customer = $request->id_customer;
        $shipping_province = $request->shipping_province;


        $month = array();
        $id_partner_delivery = array();
        $shipping_method = array();
        $shipping_fees = array();

        $content = Cart::content();
        $numberOfItems = 0;
        foreach ($content as $eachItem) {
            $month[$numberOfItems] = $request->months[$numberOfItems];
            $id_partner_delivery[$numberOfItems] = $request->partner_delivery[$numberOfItems];
            $shipping_method[$numberOfItems] = $request->shipping_method[$numberOfItems];   //0: ship chiều đi, 1: ship chiều về, 2: ship 2 chiều
            $numberOfItems += 1;
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
            $produc = DB::table('product')->where('id_product', $eachContentItem->id)->get()->first();

            $src = $produc->id_province;
            $dest = $idoder->id_province;
            $distanceCoefficient = abs(DB::table('province')->where('id_province', $src)->get()->first()->position -
                DB::table('province')->where('id_province', $dest)->get()->first()->position);
            $fee = DB::table('partner_delivery')->where('id_partner_delivery', $id_partner_delivery[$i - 1])->get()->first();
            if ($shipping_method[$i - 1] == 0) {  //chỉ ship đến
                $shipping_fees[$i - 1] = $distanceCoefficient * ($fee->shipping_fee);
            } else if ($shipping_method[$i - 1] == 1) {   //chỉ đến lấy hàng
                $shipping_fees[$i - 1] = $distanceCoefficient * $fee->return_fee;
            } else if ($shipping_method[$i - 1] == 2) {//cả 2 chiều
                $shipping_fees[$i - 1] = $distanceCoefficient * ($fee->return_fee + $fee->shipping_fee);
            }

            $deposit = 1.1 * $produc->market_price;
            DB::table('oder_detail')
                ->insert(['item_order' => $i, 'id_oder' => $id_oder, 'id_product' => $eachContentItem->id, 'shipping_fee' => $shipping_fees[$i - 1],
                    'quantity' => $eachContentItem->qty, 'discount' => Cart::discount(), 'months' => $month[$i - 1], 'id_partner_delivery' => $id_partner_delivery[$i - 1], 'deposit' => $deposit]);
            $totalcost += $shipping_fees[$i - 1] + ($eachContentItem->qty) * $deposit;
            $i++;
            DB::table('product')->where('id_product', $eachContentItem->id)->update(['isActive' => 0]);
        }
        DB::table('oder')
            ->where('id_oder', $id_oder)
            ->update(['totalcost' => $totalcost]);
        //
        return view('users.pay.savePayment')
            ->with('shipping_fees',$shipping_fees)
            ->with('shipping_email', $shipping_email)
            ->with('shipping_name', $shipping_name)
            ->with('shipping_address', $shipping_address)
            ->with('shipping_phone', $shipping_phone)
            ->with('shipping_notes', $shipping_notes)
            ->with('payment_option', $payment_option)
            ->with('id_customer', $id_customer)
            ->with('id_partner_delivery', $id_partner_delivery)
            ->with('totalcost', $totalcost)
            ->with('month', $month);
    }
}
