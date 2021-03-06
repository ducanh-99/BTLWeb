@extends('admin.welcomeAdmin')
@section('all_product')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Form add new product -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".bs-example-modal-lg">Add new product
                        </button>
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                             aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg-12" role="document">
                                <div class="modal-content">
                                    <div class="modal-body ">
                                        <section>
                                            <div>
                                                <div class="row">
                                                    <!-- left column -->

                                                    <div class="col-md-12">
                                                        <!-- general form elements -->
                                                        <div class="card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">New Product</h3>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <!-- form start -->
                                                            <form role="form" action="{{URL::to('/save-product')}}"
                                                                  method="GET">
                                                                {{ csrf_field() }}
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="branch">Branch</label>
                                                                        {{--                                                                        <input type="text" class="form-control" name="id_category_branch" id="id_category_branch" placeholder="ID của branch">--}}
                                                                        <?php
                                                                        $bra = DB::table('category_branch')->get();
                                                                        ?>
                                                                        <select class="form-control input-sm m-bot15"
                                                                                name="id_category_branch"
                                                                                id="id_category_branch">
                                                                            @foreach($bra as $indexbra)
                                                                                <option
                                                                                    value="{{$indexbra->id_category_branch}}">{{$indexbra->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Product_name">Product Name</label>
                                                                        <input type="text" name="product_name"
                                                                               class="form-control" id="product_name"
                                                                               placeholder="Product Name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <input type="text" class="form-control"
                                                                               name="product_descr" id="product_descr"
                                                                               placeholder="Description product">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="image">Image</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                       class="custom-file-input"
                                                                                       name="product_image"
                                                                                       id="product_image">
                                                                                <label class="custom-file-label"
                                                                                       for="image">Choose file</label>
                                                                            </div>
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text" id="">Upload</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Amount</label>
                                                                        <input type="text" name="product_amount"
                                                                               class="form-control" id="product_amount"
                                                                               placeholder="amount of product">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Price </label>
                                                                        <input type="text" name="product_price"
                                                                               class="form-control" id="product_price"
                                                                               placeholder="price ">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <select name="product_status"
                                                                                class="form-control input-sm m-bot15">
                                                                            <option value="0">In stock</option>
                                                                            <option value="1">Stop trading</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Market price </label>
                                                                        <input type="text" name="market_price"
                                                                               class="form-control" id="market_price"
                                                                               placeholder="market price">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Lease </label>
                                                                        {{--                                                                        <input type="text" name="id_customer" class="form-control" id="id_customer"--}}
                                                                        {{--                                                                               placeholder="Id người cho thuê: ">--}}
                                                                        <?php
                                                                        $cus = DB::table('customer')->where('isprovider', 1)->get();
                                                                        ?>
                                                                        <select class="form-control input-sm m-bot15"
                                                                                name="id_customer" id="id_customer">
                                                                            @foreach($cus as $indexcus)
                                                                                <option
                                                                                    value="{{$indexcus->id_customer}}">{{$indexcus->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Province</label>
                                                                        {{--                                                                        <input type="text" name="id_province" class="form-control" id="id_province"--}}
                                                                        {{--                                                                               placeholder="ID_Tỉnh: ">--}}
                                                                        <?php
                                                                        $prov = DB::table('province')->get();
                                                                        ?>
                                                                        <select class="form-control input-sm m-bot15"
                                                                                name="id_province" id="id_province">
                                                                            @foreach($prov as $indexprov)
                                                                                <option
                                                                                    value="{{$indexprov->id_province}}">{{$indexprov->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Status </label>
                                                                        <input type="text" name="outlook"
                                                                               class="form-control" id="outlook"
                                                                               placeholder="Status: ">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Repair History </label>
                                                                        <textarea type="text" name="repair_history"
                                                                                  class="form-control"
                                                                                  id="repair_history"
                                                                                  placeholder="Repair history"></textarea>
                                                                    </div>

                                                                    <!-- /.card-body -->

                                                                    <div class="card-footer">
                                                                        <button type="submit" name="add_product"
                                                                                class="btn btn-primary">Add New Product
                                                                        </button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end form -->
                        <br></br>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>category_branch</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>image</th>
                                <th>Amount</th>
                                <th>Price</th>
                                <th>Iscctive</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allProduct as $eachProduct)
                                <?php
                                $categoryBranchOnly = DB::table('category_branch')->where('id_category_branch', $eachProduct->id_category_branch)->get()->first();   //chứa 1 bản ghi trong bảng branch
                                $categoryMainOnly = DB::table('category_main')->where('id_category_main', $categoryBranchOnly->id_category_main)->get()->first();
                                ?>
                                <tr>
                                    <td>{{ $eachProduct->id_product }}</td>
                                    <td>{{$categoryBranchOnly->name}}</td>
                                    <td>{{ $eachProduct->name }}</td>
                                    <td>{{ $eachProduct->description }}</td>
                                    <td><img
                                            src="{{ URL::to('/') }}/public/image/{{$categoryMainOnly->name}}/{{$categoryBranchOnly->name}}/{{$eachProduct->image}}"
                                            alt="" class="img-fluid"></td>
                                    <td>{{ $eachProduct->amount }}</td>
                                    <td>{{ $eachProduct->price }}</td>
                                    <td>
                                        <?php
                                        if($eachProduct->isactive == 1){
                                        ?>
                                        <a href="{{URL::to('/unactive-product/'.$eachProduct->id_product)}}">Deactive</a>
                                        <?php
                                        }else{ //if ($eachProduct->_status==0)
                                        ?>
                                        <a href="{{URL::to('/active-product/'.$eachProduct->id_product)}}">Active</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="{{URL::to('/edit-product/'.$eachProduct->id_product)}}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div>
                            <br/>
                            <div style="float: right">
                                {!! $allProduct->links() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
