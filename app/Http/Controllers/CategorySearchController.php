<?php

namespace App\Http\Controllers;
use DB,Session;

use Illuminate\Http\Request;

class CategorySearchController extends Controller
{
    public function mainSearch(){

        $mainSearch = DB::table('category_main')->get();

        return view('users.category.category_main_list')->with('mainSearch',$mainSearch);
    }

    public function branchSearch($id_main){
        $branchSearch = DB::table('category_branch')->where('id_category_main', $id_main)->get();

        return view('users.category.category_branch_list')->with('branchSearch',$branchSearch);
    }

    public function productSearch($id_branch){
        $productSearch = DB::table('product')->where('id_category_branch', $id_branch)->get();

        return view('users.category.product_list')->with('productSearch',$productSearch);
    }
}
