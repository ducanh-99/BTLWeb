<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;

class AdminController extends Controller
{
    public function changeAdminInformation()
    {
        if (!Session::get('id_admin'))
            return redirect('login');
        else {
            $adminInformation = DB::table('admininfo')
                ->where('id_admin', Session::get('id_admin'))
                ->get()
                ->first();
            return view('admin.adminManagement.adminInformation')
                ->with('adminInformation', $adminInformation);
        }
    }

    public function alterAdminInformation(Request $request)
    {
        if (!Session::get('id_admin'))
            return redirect('login');
        else {

            $name = $request->name;
            $avatar = $request->avatar;
            $email = $request->email;
            $password = $request->password;
            $phone_number = $request->phone_number;
            $address = $request->address;
            $job = $request->job;
            $credit = $request->credit;

            DB::table('admininfo')
                ->where('id_admin', Session::get('id_admin'))
                ->update(['name' => $name, 'email' => $email, 'password' => $password, 'phone_number' => $phone_number, 'address' => $address, 'credit' => $credit,
                    'avatar' => $avatar, 'job' => $job]);

            Session::flash('success', 'Bạn thay đổi thông tin thành công');

            return redirect('/');
        }
    }

    public function addAdmin()
    {
        return view('admin.adminManagement.addAdmin');
    }

    public function saveAdmin(Request $request)
    {
        $name = $request->admin_name;
        $avatar = $request->admin_avatar;
        $email = $request->admin_email;
        $password = $request->admin_password;
        $phone_number = $request->admin_phone_number;
        $address = $request->admin_address;
        $credit = $request->admin_credit;
        $job = $request->admin_job;

        DB::insert('insert into admininfo (name,avatar, email, password, phone_number, address, credit,job, status) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [$name, $avatar, $email, $password, $phone_number, $address, $credit, $job, 1]);
        return Redirect('/add-admin');
    }
}
