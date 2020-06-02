<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use http\Exception;
use Illuminate\Http\Request;
use DB, Session, Cart;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    //quản lý đơn hàng của người đi thuê
    public function viewOrder()
    {
        if (Session::get('id_admin')) {
                $allOrder = DB::table('oder')
                    ->get();
            return view('admin.orderManagement.view_order')->with('allOrder', $allOrder);
        } else {
            return redirect('login');
        }
    }

    public function approveOrder($id_oder)
    { //duyệt
        if (Session::get('id_admin')) {
            $allOrder = DB::table('oder')
                ->where('id_oder', $id_oder)
                ->update(['isapproved' => 1]);
            return back();
        } else {
            return redirect('login');
        }
    }

    public function unApproveOrder($id_oder)
    { //hủy
        if (Session::get('id_admin')) {
            $allOrder = DB::table('oder')
                ->where('id_oder', $id_oder)
                ->update(['isapproved' => 3]);
            return back();
        } else {
            return redirect('login');
        }
    }

    public function succeedOrder($id_oder)
    { //đánh dấu giao thành công
        if (Session::get('id_admin')) {
            $allOrder = DB::table('oder')
                ->where('id_oder', $id_oder)
                ->update(['isapproved' => 2]);
            return back();
        } else {
            return redirect('login');
        }
    }

    public function viewOrderDetail($id_oder)
    {
        if (Session::get('id_admin')) {
            $allOrderDetail = DB::table('oder_detail')
                ->where('id_oder', $id_oder)
                ->get();
            return view('admin.orderManagement.view_order_detail')->with('allOrderDetail', $allOrderDetail);
        } else {
            return redirect('login');
        }
    }

    public function editOrderDetail($id_oder_detail)
    {
        if (Session::get('id_admin')) {
            $oder_detail = DB::table('oder_detail')
                ->where('id_oder_detail', $id_oder_detail)
                ->get()->first();
            return view('admin.orderManagement.edit_order_detail')->with('oder_detail', $oder_detail);
        } else {
            return redirect('login');
        }
    }

    public function submitEditOrderDetail(Request $request)
    {
        if (Session::get('id_admin')) {
            $id_oder_detail = $request->id_oder_detail;
            $item_order = $request->item_order;
            $id_oder = $request->id_oder;
            $id_product = $request->id_product;
            $quantity = $request->quantity;
            $months = $request->months;
            $id_partner_delivery = $request->id_partner_delivery;
            $deposit = $request->deposit;

            DB::table('oder_detail')
                ->where('id_oder_detail', $id_oder_detail)
                ->update(['item_order' => $item_order, 'id_oder' => $id_oder, 'id_product' => $id_product, 'quantity' => $quantity, 'months' => $months,
                    'id_partner_delivery'=>$id_partner_delivery,'deposit'=>$deposit]);
            return Redirect::to('/view-order-detail/' . $id_oder);
        } else {
            return redirect('login');
        }
    }
}
