<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Session;

class AddController extends Controller
{
    public function addBranchCategory(){
        return view('admin.add.add_branch_category');
    }

    public function saveBranchCategory(Request $request){
        $id_category_main = $request->id_category_main;
        $branch_name = $request->branch_name;
        $branch_descr = $request->branch_descr;
        $branch_logo = $request->branch_logo;
        $branch_status = $request->branch_status;

        DB::insert('insert into category_branch (id_category_main, name, descriptionf, image, status) values (?, ?, ?, ?, ?)'
            , [$id_category_main, $branch_name,$branch_descr, $branch_logo, $branch_status]);

        return back();
    }

    public function addMainCategory(){
        return view('admin.add.add_main_category');
    }

    public function saveMainCategory(Request $request){
        $main_name = $request->main_name;
        $main_descr = $request->main_descr;

        DB::insert('insert into category_main (name, description) values (?, ?)'
            , [$main_name,$main_descr]);

        return back();
    }

    public function addProduct(){
        return view('admin.add.add_product');
    }
    public function saveProduct(Request $request){
        $id_category_branch = $request->id_category_branch;
        $product_name = $request->product_name;
        $product_descr = $request->product_descr;
        $product_image = $request->product_image;
        $product_amount = $request->product_amount;
        $product_price = $request->product_price;
        $product_status = $request->product_status;

        DB::insert('insert into product (id_category_branch,name,description,image,amount,price,isActive,rate,ratequantity) values (?,?,?,?,?,?,?,?,?)'
            , [$id_category_branch,$product_name,$product_descr,$product_image,$product_amount,$product_price,$product_status,0,0]);
        return back();
    }
}
