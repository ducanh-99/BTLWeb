
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product"> {{--Chứa ảnh sản phẩm--}}
                <img src="{{URL::to('/public/uploads/product/'.$queryy->image)}}" alt=""/>
                <h3>ALEASE</h3>
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">
                        <a href=""><img src="{{URL::to('public/frontend/images/similar1.jpg')}}" alt=""></a>
                        <a href=""><img src="{{URL::to('public/frontend/images/similar2.jpg')}}" alt=""></a>
                        <a href=""><img src="{{URL::to('public/frontend/images/similar3.jpg')}}" alt=""></a>
                    </div>


                </div>

                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt=""/>
                <h2>Sản phẩm: {{$queryy->name}}</h2>
                <p>Mã ID: {{$queryy->id_product}}</p>
                <img src="images/product-details/rating.png" alt=""/>

                <form action="{{URL::to('/save-cart')}}" method="GET">  {{--Gửi số lượng mua và nút thêm giỏ hàng vào--}}
                    <span>
									<span>Giá: {{number_format($queryy->price).' VNĐ'}}</span>
                                    <br>
									<span>Kho: {{number_format($queryy->amount)}}</span>
                        <h5>Số lượng mua: </h5>
									<input name="quantity" type="number" min="1" value="1"/>
									<input name="productid_hidden" type="hidden" value="{{$queryy->id_product}}"/>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm giỏ hàng
									</button>

								</span>
                </form>
                <p><b>Loại:</b> {{$categoryMainOnly->name}}</p>
                <p><b>Danh mục:</b> {{$categoryBranchOnly->name}}</p>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""/></a>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->
