<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;
class ShowController extends Controller
{
    public function showAllBranchCategory(){
        $allCategoryBranch = DB::table('category_branch')
            ->get();
        return view('admin.show.all_branch_category')->with('allCategoryBranch',$allCategoryBranch);
    }

    public function showAllMainCategory(){
        $allCategoryMain = DB::table('category_main')
            ->get();
        return view('admin.show.all_main_category')->with('allCategoryMain',$allCategoryMain);
    }

    public function showAllProduct(){
        $allProduct = DB::table('product')
            ->get();
        return view('admin.show.all_product')->with('allProduct',$allProduct);
    }
}
