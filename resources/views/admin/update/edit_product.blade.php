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
                                <label>ID category branch</label>
                                <input type="text" name="id_category_branch" class="form-control" id="id_main"
                                       value="{{$edit_product->id_category_branch}}">
                            </div>

                            <div class="form-group">
                                <label>Tên product</label>
                                <input type="text" name="product_name" class="form-control" id="product_name"
                                       value="{{$edit_product->name}}">
                            </div>

                            <div class="form-group">
                                <label>Mô tả product</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="product_descr"
                                          id="product_descr">{{$edit_product->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="product_image" class="form-control" id="product_logo"
                                       value="{{$edit_product->image}}">
                            </div>

                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="text" name="product_amount" class="form-control" id="product_amount"
                                       value="{{$edit_product->amount}}">
                            </div>

                            <div class="form-group">
                                <label>Giá cả</label>
                                <input type="text" name="product_price" class="form-control" id="product_price"
                                       value="{{$edit_product->price}}">
                            </div>

                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="product_isActive" class="form-control input-sm m-bot15">
                                    <option value="0">Ngừng kinh doanh</option>
                                    <option value="1">Còn hàng</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Giá thị trường: </label>
                                <input type="text" name="market_price" class="form-control" id="market_price"
                                       value="{{$edit_product->market_price}}">
                            </div>

                            <div class="form-group">
                                <label>ID người cho thuê: </label>
                                <input type="text" name="id_customer" class="form-control" id="id_customer"
                                       value="{{$edit_product->id_customer}}">
                            </div>

                            <div class="form-group">
                                <label>id_province: </label>
                                <input type="text" name="id_province" class="form-control" id="id_province"
                                       value="{{$edit_product->id_province}}">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng: </label>
                                <input type="text" name="outlook" class="form-control" id="outlook"
                                       value="{{$edit_product->outlook}}">
                            </div>
                            <div class="form-group">
                                <label>Lịch sử sửa chữa: </label>
                                <textarea type="text" name="repair_history" class="form-control" id="repair_history">{{$edit_product->repair_history}}</textarea>
                            </div>

                            <button type="submit" name="edit_submit" class="btn btn-info">Xác nhận sửa product</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
