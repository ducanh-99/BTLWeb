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
        // get desription of category_main
        $idMain = $branchSearch[0]->id_category_main;
        $descriptionMain = DB::table('category_main')->select('name', 'description')->where('id_category_main', $idMain)->first();
        return view('users.category.category_branch_list')
            ->with('branchSearch',$branchSearch)
            ->with('descriptionMain', $descriptionMain)
        ;

    }

    public function productSearch($id_branch){
        //select name, image, id_main, description
        $nameBranch = DB::table('category_branch')->select('name', 'image', 'id_category_main','descriptionf')->where('id_category_branch',$id_branch)->first();
        
        $nameMain = DB::table('category_main')->select('name')->where('id_category_main', $nameBranch->id_category_main)->first();
        
        $productSearch = DB::table('product')->where('id_category_branch', $id_branch)->get();
        // url get image of product
        $url = $nameMain->name . '/' . $nameBranch->name . '/';
        return view('users.category.product_list',['productSearch'=>$productSearch, 'url'=>$url, 'nameBranch'=>$nameBranch]);
    }
}
