<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Session;
use Illuminate\Support\Facades\Redirect;

class EditController extends Controller
{
    public function editBranchCategory($id_category_branch){
        //tìm id
        $edit_branch_category = DB::table('category_branch')->where('id_category_branch',$id_category_branch)->get()->first();
        //quăng sang trang edit
        return view('admin.update.edit_branch_category')->with('edit_branch_category', $edit_branch_category);
    }

    public function submitEditBranch(Request $request){
        $id_category_branch = $request->id_category_branch;
        $id_category_main = $request->id_category_main;
        $branch_name = $request->branch_name;
        $branch_descr = $request->branch_descr;
        $branch_logo = $request->branch_logo;
        $branch_status = $request->branch_status;

        DB::table('category_branch')->where('id_category_branch',$id_category_branch)
            ->update(['id_category_main' =>$id_category_main ,'name' =>$branch_name ,'descriptionf' =>$branch_descr , 'image' =>$branch_logo , 'status' =>$branch_status]);

        return Redirect::to('/all-branch-category');
    }

    public function editProduct($id_product){
        //tìm id
        $edit_product = DB::table('product')->where('id_product',$id_product)->get()->first();
        //quăng sang trang edit
        return view('admin.update.edit_product')->with('edit_product', $edit_product);
    }

    public function submitEditProduct(Request $request){
        $id_product = $request->id_product;
        $id_category_branch = $request->id_category_branch;
        $product_name = $request->product_name;
        $product_descr = $request->product_descr;
        $product_image = $request->product_image;
        $product_amount = $request->product_amount;
        $product_price = $request->product_price;
        $product_isActive = $request->product_isActive;

        DB::table('product')->where('id_product',$id_product)
            ->update(['id_category_branch' =>$id_category_branch ,'name' =>$product_name ,'description' =>$product_descr ,
                'image' =>$product_image , 'amount' =>$product_amount, 'price' =>$product_price, 'isactive'=>$product_isActive]);

        return Redirect::to('/all-product');
    }

    public function editMainCategory($id_category_main){
        //tìm id
        $edit_main_category = DB::table('category_main')->where('id_category_main',$id_category_main)->get()->first();
        //quăng sang trang edit
        return view('admin.update.edit_main_category')->with('edit_main_category',$edit_main_category );
    }

    public function submitEditMain(Request $request){
         $id_category_main= $request->id_category_main;
        $main_name= $request->main_name;
        $main_descr= $request->main_descr;

        DB::table('category_main')->where('id_category_main',$id_category_main)
            ->update(['name' =>$main_name ,'description' =>$main_descr]);

        return Redirect::to('/all-main-category');
    }
}
