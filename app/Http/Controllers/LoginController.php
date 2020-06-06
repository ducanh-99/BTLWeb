<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB, Session;

class LoginController extends Controller
{
    public function login_check(Request $request)
    {
        $email = $request->email_account;
        $password = $request->password_account;
        $isAdmin = $request->isAdmin;
        if (!$isAdmin) { //nếu ko phải admin
            $resultUser = DB::table('customer')->where('email', $email)->where('password', $password)->first();
            if ($resultUser == null)
                $check = false;
            else $check = true;
            if ($resultUser) {    //nếu người dùng đăng nhập đúng
                Session::put('login', true);
                Session::put('id_customer', $resultUser->id_customer);
                Session::remove('id_admin');
                if ($resultUser->isprovider == 1) {
                    Session::put('id_lease', $resultUser->id_customer);
                }

                //duyệt các đơn hàng đã hết hạn cho người dùng
                $allExpiredOrderDetail = array();
                $deltaMonth = DB::table('oder_detail')
                    ->join('oder', 'oder_detail.id_oder', '=', 'oder.id_oder')->get();
                foreach ($deltaMonth as $eachDeltaMonth) {
                    if (ceil(abs(strtotime(date('Y-m-d H:i:s')) -
                                strtotime($eachDeltaMonth->date)) / (60 * 60 * 24 * 30)) - 1 > $eachDeltaMonth->months) {//nếu còn 1 tháng nữa thì hết hạn
                        if (Session::get('id_customer') == $eachDeltaMonth->id_customer) {   //nếu đơn đúng là của người đang đăng nhập
                            $allExpiredOrderDetail[] = $eachDeltaMonth;
                        }
                    }
                }
                $cnt = count($allExpiredOrderDetail);
                if ($cnt > 0) {
                    echo "<script type='text/javascript'>
                        var r=confirm(\"bạn đang có $cnt đồ thuê sắp hoặc đã hết hạn, vui lòng trả lại sản phẩm trong thời gian sớm nhất có thể, ấn OK để xem chi tiết\");
                        if (r==true){
                            location.href = \"http://localhost/CNWeb/BTLWeb/user-all-expired-order-detail\";
                        } else{
                            location.href = \"http://localhost/CNWeb/BTLWeb/home\";
                        }
                      </script>";
                    //duyệt xong
                } else {
                    return view('users.home');
                }
            } else {
                $alert = 'Email or password is wrong';
                return view('users.login', compact('check', 'alert'));
            }
        } else { //nếu là admin
            $resultAdmin = DB::table('admininfo')->where('email', $email)->where('password', $password)->first();
            $check = $resultAdmin;
            if ($resultAdmin == null)
                $check = false;
            else $check = true;
            if ($resultAdmin) {   //nếu admin đăng nhập đúng
                Session::put('login', true);
                Session::put('id_admin', $resultAdmin->id_admin);
                Session::remove('id_customer');
                return view('admin.welcomeAdmin');
            } else {
                $alert = 'Email or password is wrong. Are you admin?';
                return view('users.login', compact('check', 'alert'));
            }
        }
    }

    public function login()
    {
        return view('users.login');
    }

    public function logout()
    {
        if (Session::get('id_customer') || Session::get('id_admin')) {
            Session::put('login', false);
            Session::remove('id_customer');
            Session::remove('id_admin');
            // Session::remove('id_lease');
            return redirect('login');
        } else return redirect('/');
    }

    public function welcomeAdmin()
    {
        if (Session::get('id_admin')) {
            return view('admin.welcomeAdmin');
        } else {
            return redirect('login');
        }
    }
}
