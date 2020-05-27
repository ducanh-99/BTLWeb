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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add new product</button>
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                <div class="modal-dialog modal-lg-12" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body ">
                                            <section>
                                                <div >
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
                                                            <form role="form" action="{{URL::to('/save-product')}}" method="GET">
                                                                {{ csrf_field() }}
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="Id_product">ID Branch</label>
                                                                        <input type="text" class="form-control" name="id_category_branch" id="id_category_branch" placeholder="ID của branch">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Product_name">Product Name</label>
                                                                        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label>Description</label>
                                                                            <input type="text" class="form-control" name="product_descr" id="product_descr" placeholder="Mô tả product">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="image">Image</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" name="product_image" id="product_image">
                                                                                <label class="custom-file-label" for="image">Choose file</label>
                                                                            </div>
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text" id="">Upload</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Số lượng</label>
                                                                        <input type="text" name="product_amount" class="form-control" id="product_amount"
                                                                            placeholder="Số lượng">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Giá: </label>
                                                                        <input type="text" name="product_price" class="form-control" id="product_price"
                                                                            placeholder="Giá: ">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <select name="product_status" class="form-control input-sm m-bot15">
                                                                            <option value="0">Còn hàng</option>
                                                                            <option value="1">Ngừng kinh doanh</option>
                                                                        </select>
                                                                    </div>
                                                                
                                                                <!-- /.card-body -->

                                                                    <div class="card-footer">
                                                                    <button type="submit" name="add_product" class="btn btn-primary">Add New Product</button>
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
                                    <!-- <th>Id_category_branch</th> -->
                                    <th>Name</th>
                                    <th>Description</th>
                                    <!-- <th>image</th> -->
                                    <th>Amount</th>
                                    <th>Price</th>
                                    <th>Iscctive</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allProduct as $eachProduct)
                                <tr>
                                    <td>{{ $eachProduct->id_product }}</td>
                                    <!-- <td>{{ $eachProduct->id_category_branch }}</td> -->
                                    <td>{{ $eachProduct->name }}</td>
                                    <td>{{ $eachProduct->description }}</td>
                                    <!-- <td>{{ $eachProduct->image }}</td> -->
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
                    </div>
            <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection