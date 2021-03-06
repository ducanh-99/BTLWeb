@extends('admin.welcomeAdmin')
@section('all_branch_category')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{URL::to('/submit-edit-product')}}" method="GET">
                            <input type="hidden" name="id_product" value="{{$edit_product->id_product}}">
                            <div class="form-group">
                                <label>Category branch</label>
{{--                                <input type="text" name="id_category_branch" class="form-control" id="id_main"--}}
{{--                                       value="{{$edit_product->id_category_branch}}">--}}
                                <?php
                                $bra = DB::table('category_branch')->get();
                                ?>
                                <select  class="form-control input-sm m-bot15" name="id_category_branch" id="id_category_branch" >
                                    @foreach($bra as $indexbra)
                                        <option
                                            <?php if($indexbra->id_category_branch ==  $edit_product->id_category_branch) echo "selected" ?>
                                            value="{{$indexbra->id_category_branch}}">{{$indexbra->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="product_name" class="form-control" id="product_name"
                                       value="{{$edit_product->name}}">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="product_descr"
                                          id="product_descr">{{$edit_product->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="product_image" class="form-control" id="product_logo"
                                       value="{{$edit_product->image}}" required>
                            </div>

                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="product_amount" class="form-control" id="product_amount"
                                       value="{{$edit_product->amount}}">
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="product_price" class="form-control" id="product_price"
                                       value="{{$edit_product->price}}">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="product_isActive" class="form-control input-sm m-bot15">
                                    <option value="0">Stop trading</option>
                                    <option value="1">In stock</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Market price</label>
                                <input type="text" name="market_price" class="form-control" id="market_price"
                                       value="{{$edit_product->market_price}}">
                            </div>

                            <div class="form-group">
                                <label>lease </label>
{{--                                <input type="text" name="id_customer" class="form-control" id="id_customer"--}}
{{--                                       value="{{$edit_product->id_customer}}">--}}
                                <?php
                                $cus = DB::table('customer')->where('isprovider',1)->get();
                                ?>
                                <select  class="form-control input-sm m-bot15" name="id_customer" id="id_customer" >
                                    @foreach($cus as $indexcus)
                                        <option
                                            <?php if($indexcus->id_customer ==  $edit_product->id_customer) echo "selected" ?>
                                            value="{{$indexcus->id_customer}}">{{$indexcus->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Province </label>
{{--                                <input type="text" name="id_province" class="form-control" id="id_province"--}}
{{--                                       value="{{$edit_product->id_province}}">--}}
                                <?php
                                $prov = DB::table('province')->get();
                                ?>
                                <select  class="form-control input-sm m-bot15" name="id_province" id="id_province" >
                                    @foreach($prov as $indexprov)
                                        <option
                                            <?php if($indexprov->id_province ==  $edit_product->id_province) echo "selected" ?>
                                            value="{{$indexprov->id_province}}">{{$indexprov->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status </label>
                                <input type="text" name="outlook" class="form-control" id="outlook"
                                       value="{{$edit_product->outlook}}">
                            </div>
                            <div class="form-group">
                                <label>Repair history</label>
                                <textarea type="text" name="repair_history" class="form-control" id="repair_history">{{$edit_product->repair_history}}</textarea>
                            </div>

                            <button type="submit" name="edit_submit" class="btn btn-info">Edit product</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
