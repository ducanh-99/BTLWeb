 @foreach($product as $key => $productValue) {{--$product chứa tất cả các bản ghi đã truy vấn, $key chứa chỉ số bản ghi, $productValue chứa từng bản ghi một--}}
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <a href="{{URL::to('/detail/'.$productValue->id_product)}}">  {{--Dẫn đến trang chi tiết sản phẩm--}}
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/uploads/product/'.$productValue->image)}}" alt="" />
                            <h2>{{number_format($productValue->price).' '.'VNĐ'}}</h2>
                            <p>{{value($productValue->name)}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                        </div>

                    </div>
                </a>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
<?php
//foreach ($array as $key => $value){
//    // Các dòng lệnh
//}
    ?>
