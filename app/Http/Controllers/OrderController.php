<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session,DB,Cart;
class OrderController extends Controller
{
    public function viewUserOrderDetail($id_oder){  //xem chi tiết từng sản phẩm trong đơn hàng
        if (Session::get('id_customer')) {
            $allUserOrderDetail = DB::table('oder_detail')
                ->where('id_oder', $id_oder)
                ->get();
            return view('users.order.userOrderDetail')->with('allUserOrderDetail', $allUserOrderDetail);
        } else {
            return redirect('login');
        }
    }



    public function viewUserOrder(){    //xem các đơn hàng của người dùng
        if (Session::get('id_customer')) {
            $allUserOrder = DB::table('oder')
                ->where('id_customer',Session::get('id_customer'))
                ->get();
            if(!empty($allUserOrder)) {
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


    //UPDATE `alease`.`oder_detail` SET `returned_date` = '2020-06-01' WHERE (`id_oder_detail` = '8');
    public function returnOrderDetail($id_oder_detail){ //xử lý sự kiện khi người dùng ấn vào nút đăng ký trả hàng
        //hệ thống sẽ hiển thị tất cả các thông tin liên quan đơn hàng mà người dùng muốn trả, bao gồm cả tiền trả lại
        //người dùng có thể đồng ý hoặc ko đồng ý trả hàng
        if (Session::get('id_customer')) {
            $chiTiet = DB::table('oder_detail')->where('id_oder_detail',$id_oder_detail)->get()->first();
            $tongQuat = DB::table('oder')->where('id_oder',$chiTiet->id_oder)->get()->first();
            $goods = DB::table('product')->where('id_product',$chiTiet->id_product)->get()->first();

            $thoiGianDaThue = ceil(abs(strtotime(date('Y-m-d H:i:s')) - strtotime($tongQuat->date))/(60*60*24*30));

            if($thoiGianDaThue - $chiTiet->months > $chiTiet->months /3){//trả đồ trễ hơn 1/3 thời gian thuê -> ko nhận nữa
                $msg = "Bạn đã thuê ".$goods->name." quá thời hạn quy định, chúng tôi không nhận sản phẩm đó nữa. Xin lỗi quý khách vì sự bất tiện này.";
                $returnFee = 0;
            }
            else if ($thoiGianDaThue - $chiTiet->months <= 0){
                $msg = "Bạn đã thuê ".$goods->name." trong ".$thoiGianDaThue." tháng. Số tiền được hoàn trả là: ";
                $returnFee =$chiTiet->deposit - $chiTiet->quantity * $goods->price * $chiTiet->months;
            } else{
                $msg = "Bạn đã thuê ".$goods->name." trong ".$thoiGianDaThue." tháng, quá ".$thoiGianDaThue - $chiTiet->months." tháng. Số tiền được hoàn trả là: ";
                $returnFee =$chiTiet->deposit - $chiTiet->quantity * $goods->price * $chiTiet->months;
            }
            return view('users.order.returnOrderDetail')->with('returnFee', $returnFee)->with('msg',$msg)->with('chiTiet',$chiTiet)->with('goods',$goods)
                ->with('tongQuat',$tongQuat);
        } else {
            return redirect('login');
        }
    }

    public function submitReturnOrderDetail(Request $request){  //nếu người dùng đồng ý trả hàng
        DB::table('oder_detail')->where('id_oder_detail',$request->chiTietID)->update(['returned_date'=>date('Y-m-d H:i:s')]);
        return view('users.order.successfullyReturned');
    }
}
