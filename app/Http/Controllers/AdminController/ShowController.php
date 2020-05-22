<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;

class ShowController extends Controller
{
    public function showAllBranchCategory()
    {
        if (Session::get('id_admin')) {
            $allCategoryBranch = DB::table('category_branch')
                ->get();
            return view('admin.show.all_branch_category')->with('allCategoryBranch', $allCategoryBranch);
        } else {
            return redirect('login');
        }
    }

    public function showAllMainCategory()
    {
        if (Session::get('id_admin')) {
            $allCategoryMain = DB::table('category_main')
                ->get();
            return view('admin.show.all_main_category')->with('allCategoryMain', $allCategoryMain);
        } else {
            return redirect('login');
        }
    }

    public function showAllProduct()
    {
        if (Session::get('id_admin')) {
            $allProduct = DB::table('product')
                ->get();
            return view('admin.show.all_product')->with('allProduct', $allProduct);
        } else {
            return redirect('login');
        }
    }
}
