@extends('welcome')
@section('lease')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="breadcrumbs">
                <ul class="breadcrumb d-flex justify-content-end">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item">Edit Product</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>
                </div>d
                <!-- /.card-header -->
                <div class="card-body">
                <a href="{{URL::to('/lease-view-order-detail')}}">
                        <button type="button" class="btn btn-primary">Leased
                        </button>
                    </a>
                    <a href="{{URL::to('/lease-recent-returned-list')}}">
                        <button type="button" class="btn btn-primary">Recent Returned
                        </button>
                    </a>
                    <a href="{{URL::to('/lease-all-product')}}">
                        <button type="button" class="btn btn-primary">Manage Product
                        </button>
                    </a>
                    <a href="{{URL::to('/lease-all-expired-order-detail')}}">
                        <button type="button" class="btn btn-primary">Expired Order
                        </button>
                    </a>
                    <form action="{{URL::to('/lease-submit-edit-product')}}" method="GET">
                        <input type="hidden" name="id_product" value="{{$edit_product->id_product}}">
                        <div class="form-group">
                            <label>category branch</label>
                            {{-- <input type="text" name="id_category_branch" class="form-control" id="id_main"--}}
                            {{-- value="{{$edit_product->id_category_branch}}">--}}
                            <?php
                            $bra = DB::table('category_branch')->get();
                            ?>
                            <select class="form-control input-sm m-bot15" name="id_category_branch" id="id_category_branch">
                                @foreach($bra as $indexbra)
                                <option <?php if ($indexbra->id_category_branch ==  $edit_product->id_category_branch) echo "selected" ?> value="{{$indexbra->id_category_branch}}">{{$indexbra->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tên product</label>
                            <input type="text" name="product_name" class="form-control" id="product_name" value="{{$edit_product->name}}">
                        </div>

                        <div class="form-group">
                            <label>Mô tả product</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="product_descr" id="product_descr">{{$edit_product->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="product_image" class="form-control" id="product_logo" value="{{$edit_product->image}}">
                        </div>

                        <div class="form-group">
                            <label>Số lượng</label>
                            <input type="text" name="product_amount" class="form-control" id="product_amount" value="{{$edit_product->amount}}">
                        </div>

                        <div class="form-group">
                            <label>Giá cả</label>
                            <input type="text" name="product_price" class="form-control" id="product_price" value="{{$edit_product->price}}">
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
                            <input type="text" name="market_price" class="form-control" id="market_price" value="{{$edit_product->market_price}}">
                        </div>

                        <div class="form-group">
                            <label>province: </label>
                            {{-- <input type="text" name="id_province" class="form-control" id="id_province"--}}
                            {{-- value="{{$edit_product->id_province}}">--}}
                            <?php
                            $prov = DB::table('province')->get();
                            ?>
                            <select class="form-control input-sm m-bot15" name="id_province" id="id_province">
                                @foreach($prov as $indexprov)
                                <option <?php if ($indexprov->id_province ==  $edit_product->id_province) echo "selected" ?> value="{{$indexprov->id_province}}">{{$indexprov->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tình trạng: </label>
                            <input type="text" name="outlook" class="form-control" id="outlook" value="{{$edit_product->outlook}}">
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
