<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session, DB;
class LeaseController extends Controller
{
    public function showAllProduct()    //hiển thị tất cả sản phẩm của bên cho thuê
    {
        if (Session::get('id_lease')) {
            $allProduct = DB::table('product')
                ->where('id_customer',Session::get('id_lease'))
                ->get();

            return view('users.lease.all_product')->with('allProduct', $allProduct);
        } else {
            return redirect('login');
        }
    }

    public function editProduct($id_product)
    {
        if (Session::get('id_lease')) {//tìm id
            $edit_product = DB::table('product')->where('id_product', $id_product)->get()->first();
            //quăng sang trang edit
            return view('users.lease.edit_product')->with('edit_product', $edit_product);
        } else {
            return redirect('login');
        }
    }

    public function submitEditProduct(Request $request)
    {
        if (Session::get('id_lease')) {
            $id_product = $request->id_product;
            $id_category_branch = $request->id_category_branch;
            $product_name = $request->product_name;
            $product_descr = $request->product_descr;
            $product_image = $request->product_image;
            $product_amount = $request->product_amount;
            $product_price = $request->product_price;
            $product_isActive = $request->product_isActive;
            $market_price = $request->market_price;
            $id_province = $request->id_province;
            $outlook = $request->outlook;
            $repair_history = $request->repair_history;

            DB::table('product')->where('id_product', $id_product)
                ->update(['id_category_branch' => $id_category_branch, 'name' => $product_name, 'description' => $product_descr,
                    'image' => $product_image, 'amount' => $product_amount, 'price' => $product_price, 'isactive' => $product_isActive,
                    'market_price' => $market_price,'id_customer' => Session::get('id_lease'),'id_province' => $id_province,
                    'outlook' => $outlook,'repair_history' => $repair_history]);

            return Redirect::to('/lease-all-product');
        } else {
            return redirect('login');
        }
    }

    public function viewOrderDetail()
    {
        if (Session::get('id_lease')) {
            $allOrderDetail = DB::table('product')
                ->join('oder_detail', 'oder_detail.id_product', '=', 'product.id_product')
                ->join('customer', 'customer.id_customer', '=', 'product.id_customer')
                ->where('customer.id_customer', Session::get('id_lease'))
                ->get();
            return view('users.lease.view_order_detail_leased')->with('allOrderDetail', $allOrderDetail);
        } else {
            return redirect('login');
        }
    }

    public function unactiveProduct($id_product)
    {
        if (Session::get('id_lease')) {
            DB::table('product')->where('id_product', $id_product)->update(['isActive' => 0]);
            Session::put('message', 'Xóa product thành công');
            return Redirect::to('/lease-all-product');
        } else {
            return redirect('login');
        }
    }

    public function activeProduct($id_product)
    {
        if (Session::get('id_lease')) {
            DB::table('product')->where('id_product', $id_product)->update(['isActive' => 1]);
            Session::put('message', 'Active product thành công');
            return Redirect::to('/lease-all-product');
        } else {
            return redirect('login');
        }
    }

    public function showRecentReturnedList(){   //hiển thị danh mục các sản phẩm người dùng đã trả nhưng đang trên đường trở về với người cho thuê
        if (Session::get('id_lease')) {
            $recentReturnedList = DB::table('oder_detail')->whereNotNull('returned_date')->where('isclosed',0)->get();
            return view('users.lease.recentReturnedList')->with('recentReturnedList',$recentReturnedList);
        } else {
            return redirect('login');
        }
    }

    public function updateOutlook(Request $request){    //người cho thuê xem lại tình trạng sản phẩm trước khi cho vào danh mục product để cho thuê tiếp
        if (Session::get('id_lease')) {
            DB::table('product')->where('id_product',$request->id_product)->update(['outlook'=>$request->outlook]);
            DB::table('oder_detail')->where('id_oder_detail',$request->id_oder_detail)->update(['isclosed'=>'1']);
        return redirect('/lease-all-product');
        } else {
            return redirect('login');
        }
    }
}