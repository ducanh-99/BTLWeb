@extends('welcome')
@section('product_detail')
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">{{$queryy->name}}</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Home</a></li>
          <li class="breadcrumb-item"> <a href="{{URL::to('/branch-result/'.$queryy->id_category_main)}}">{{$categoryMainOnly->name}}</a> </li>
          <li class="breadcrumb-item"> <a href="{{URL::to('/product-result/'.$queryy->id_category_branch)}}">{{$categoryBranchOnly->name}}</a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
    <div class="container">
        <div class="col-lg-9">
            <p></p>
            <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Scroll to product details</a></p>
            <div id="productMain" class="row">
                <div class="col-sm-6">
                  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                    <div> <img src="{{ URL::to('/') }}/public/image/{{$categoryMainOnly->name}}/{{$categoryBranchOnly->name}}/{{$queryy->image}}" alt="" class="img-fluid"></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="box">
                    <form  action="{{URL::to('/save-cart')}}" method="GET">
                      <div class="sizes">
                        <h3>The number of renting</h3>
                        <select class="bs-select">
                          @for ($i = 1; $i <= $queryy->amount; $i++)
                          <option value="small">{{$i}}</option>
                          @endfor
                        </select>
                        @if ($queryy->amount == 1)
                          <h6>There is 1 products available</h6>
                        @else
                          <h6>There are {{$queryy->amount}} products available</h6>
                        @endif
                      </div>
                      <!-- <input name="quantity" type="number" min="1" value="1"/> -->
					  <input name="productid_hidden" type="hidden" value="{{$queryy->id_product}}"/>
                      <p class="price">{{$queryy->price}} $</p>
                      <p class="text-center">
                        <button type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                        <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn btn-default"><i class="fa fa-heart-o"></i></button>
                      </p>
                    </form>
                  </div>
                </div>
            </div>
            <div id="details" class="box mb-4 mt-4">
                <p></p>
                <h4>{{$queryy->description}}</h4>
            </div>
        </div>
        <!-- <div class="row">
            <div class = "col-sm-3"></div>
            <div class = "col-sm-6">
            <section>
                <div class="project owl-carousel"> {{--Chứa ảnh sản phẩm--}}
                    <div class="item">
                        <img src="{{ URL::to('/') }}/public/image/{{$categoryMainOnly->name}}/{{$categoryBranchOnly->name}}/{{$queryy->image}}" alt="" class="img-fluid"    />
                    </div>
                </div>
            </section>
            </div>
            <div class = "col-sm-3"></div>
        </div> -->
    <div>
        <h1>Rating:</h1>
        @if( $queryy->ratequantity == 0 || $queryy->ratequantity == 1)
            <h4>There was {{$queryy->ratequantity}} user rating</h4>
        @else
            <h4>There were {{$queryy->ratequantity}} users rating</h4>
        @endif
        <h4>ĐTB: {{$queryy->rate}}</h4>
        <form action="{{URL::to('/rating')}}" method="GET">
            <input name="productid_hidden" type="hidden" value="{{$queryy->id_product}}"/>
            <select name="point" id="point">
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
            <?php
            if (Session::get('id_customer')) {
            ?>
                <button type="submit" class="btn-template-main">Chấm điểm</button>
            <?php
            } else{
                echo "You must sign in to rating";
            }
            ?>
        </form>
        <h1>Bình luận:</h1>
        <?php
        if (Session::get('id_customer')) {
            ?>
                <form  action="{{URL::to('/comment')}}" method="GET">
                    <textarea name="comment" placeholder="What do you think about our product?" content="">
                    </textarea>
                    <input name="productid_hidden" type="hidden" value="{{$queryy->id_product}}"/>
                    <input name="customerid_hidden" type="hidden" value="{{Session::get('id_customer')}}"/>
                    <button type="submit" class="btn-template-main">Gửi bình luận</button>
                </form>
        <?php
        } else {
            echo "You must sign in to comment";
        }
        $commentList = DB::table('coment')
            ->where('id_product', $queryy->id_product)
            ->get();
        ?>
        @foreach($commentList as $eachCommentList)
            <row>
            <h5>Người dùng: {{$eachCommentList->id_customer}}</h5>
            <h3>{{$eachCommentList->content}}</h3>
                <?php
        if (Session::get('id_admin')) {
            ?>
            <a href="{{URL::to('/delete-comment/'.$eachCommentList->id_coment)}}">Xóa bình luận</a>
            <?php
        }
        ?>
            </row>
        @endforeach
    </div>
    </div>
</div>

@endsection
