<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Session,Cart;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function viewOrder(){
        $allOrder = DB::table('oder')
            ->get();
        return view('admin.orderManagement.view_order')->with('allOrder',$allOrder);
    }

    public function approveOrder($id_oder){ //duyệt
        $allOrder = DB::table('oder')
            ->where('id_oder',$id_oder)
            ->update(['isapproved'=>1]);
        return back();
    }

    public function unApproveOrder($id_oder){ //hủy
        $allOrder = DB::table('oder')
            ->where('id_oder',$id_oder)
            ->update(['isapproved'=>3]);
        return back();
    }

    public function succeedOrder($id_oder){ //đánh dấu giao thành công
        $allOrder = DB::table('oder')
            ->where('id_oder',$id_oder)
            ->update(['isapproved'=>2]);
        return back();
    }

    public function viewOrderDetail($id_oder){
        $allOrderDetail = DB::table('oder_detail')
            ->where('id_oder',$id_oder)
            ->get();
        return view('admin.orderManagement.view_order_detail')->with('allOrderDetail',$allOrderDetail);
    }

    public function editOrderDetail($id_oder_detail){
        $oder_detail = DB::table('oder_detail')
            ->where('id_oder_detail',$id_oder_detail)
            ->get()->first();
        return view('admin.orderManagement.edit_order_detail')->with('oder_detail',$oder_detail);
    }

    public function submitEditOrderDetail(Request $request){
        $id_oder_detail = $request->id_oder_detail;
        $item_order = $request->item_order;
        $id_oder = $request->id_oder;
        $id_product = $request->id_product;
        $quantity = $request->quantity;
        $months = $request->months;

        DB::table('oder_detail')
            ->where('id_oder_detail',$id_oder_detail)
            ->update(['item_order'=>$item_order,'id_oder'=>$id_oder,'id_product'=>$id_product,'quantity'=>$quantity,'months'=>$months]);
        return Redirect::to('/view-order-detail/'.$id_oder);
    }
}
