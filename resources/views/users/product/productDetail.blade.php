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
                        <li class="breadcrumb-item"><a
                                href="{{URL::to('/branch-result/'.$queryy->id_category_main)}}">{{$categoryMainOnly->name}}</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{URL::to('/product-result/'.$queryy->id_category_branch)}}">{{$categoryBranchOnly->name}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="content">
        <div class="container">
            <div class="col-lg-9">
                <p></p>
                <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Scroll to product
                        details</a></p>
                <div id="productMain" class="row">
                    <div class="col-sm-6">
                        <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                            <div><img
                                    src="{{ URL::to('/') }}/public/image/{{$categoryMainOnly->name}}/{{$categoryBranchOnly->name}}/{{$queryy->image}}"
                                    alt="" class="img-fluid"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- <div class="box"> -->
                        <form action="{{URL::to('/save-cart')}}" method="GET">
                            <div class="sizes">
                                <h3>The number of renting</h3>
                                <div>
                                    <input class="form-control" type="number" id="example-number-input"/>
                                </div>
                                <select name="quantity" class="bs-select">
                                    @for ($i = 1; $i <= $queryy->amount; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                @if ($queryy->amount == 1)
                                    <h6>There is 1 products available</h6>
                                @else
                                    <h6>There are {{$queryy->amount}} products available</h6>
                                @endif
                            </div>
                            <input name="productid_hidden" type="hidden" value="{{$queryy->id_product}}"/>
                            <p class="price">rental price: {{$queryy->price}} $ / months</p>
                            <!-- <h6>Giá thị trường: {{$queryy->market_price}} $</h6> -->
                            <?php
                            $provin = DB::table('province')->where('id_province', $queryy->id_province)->get()->first();
                            ?>
                            <div>Status: {{$queryy->outlook}}%</div>
                            <div>Repair history: {{$queryy->repair_history}}</p>
                            <div>Number of rentals: {{$queryy->times_rent}}</div>
                            <div>Available at: {{$provin->name}}</div>
                            <p class="text-center">
                                <button type="submit" class="btn btn-template-outlined"><i
                                        class="fa fa-shopping-cart"></i> Add to cart
                                </button>
                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to wishlist"
                                        class="btn btn-default"><i class="fa fa-heart-o"></i></button>
                            </p>
                        </form>
                        <?php
                        $cus = DB::table('customer')->where('id_customer', $queryy->id_customer)->get()->first();
                        ?>
                        <div>Rented by: {{$cus->name}}</div>
                        <div>Owener address: {{$cus->address}}</div>
                        <div>Phone numbers: {{$cus->phone_number}}</div>
                        @if($queryy->amount == 0)
                            <div>Status: Has been leased out</div>
                        @endif
                        @if($queryy->isactive == 0)
                            <div>Status: Stop renting</div>
                        @endif
                        @if($queryy->isactive == 1)
                            <div>Status: Available</div>
                    @endif
                    <!-- </div> -->
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
                <h4>AVG: {{$queryy->rate}}</h4>


                <form action="{{URL::to('/rating')}}" method="GET">
                    <input name="productid_hidden" type="hidden" value="{{$queryy->id_product}}"/>
                    <select name="point" id="point">
                        @for ($i = 0; $i <= 10; $i++)
                            <option>{{$i}}</option>
                        @endfor
                    </select>
                    <button type="submit" class="btn-template-main">Rate</button>


                </form>
                <h1>Comment:</h1>
                <?php
                if (Session::get('id_customer')) {
                ?>
                <form action="{{URL::to('/comment')}}" method="GET">
                    <textarea name="comment" placeholder="What do you think about our product?" rows="6"
                              cols="50"></textarea>
                    <input name="productid_hidden" type="hidden" value="{{$queryy->id_product}}"/>
                    <input name="customerid_hidden" type="hidden" value="{{Session::get('id_customer')}}"/>
                    <br>
                    <button type="submit" class="btn-template-main">Gửi bình luận user</button>
                </form>
                <?php
                }else if (Session::get('id_admin')) {
                ?>
                <form action="{{URL::to('/admin-comment')}}" method="GET">
                    <textarea name="comment" placeholder="What do you want to announce to users?" rows="6"
                              cols="50"></textarea>
                    <input name="productid_hidden" type="hidden" value="{{$queryy->id_product}}"/>
                    <input name="adminid_hidden" type="hidden" value="{{Session::get('id_admin')}}"/>
                    <br>
                    <button type="submit" class="btn-template-main">Gửi bình luận admin</button>
                </form>
                <?php
                } else {
                    echo "You must sign in to comment";
                }
                $adminCommentList = DB::table('coment_admin') //chứa coment của ad
                ->join('admininfo', 'admininfo.id_admin', '=', 'coment_admin.id_admin')
                    ->where('coment_admin.id_product', $queryy->id_product)
                    ->get();

                $commentList = DB::table('coment')  //chứa coment của user
                ->join('customer', 'customer.id_customer', '=', 'coment.id_customer')
                    ->where('coment.id_product', $queryy->id_product)
                    ->get();
                ?>
                @foreach($adminCommentList as $eachAdminCommentList)
                    <row>
                        <hr>
                        <h4 style="color:red;">Admin: {{$eachAdminCommentList->name}}</h4>
                        <h5><i class="fa fa-comment" aria-hidden="true"></i> {{$eachAdminCommentList->content}}</h5>

                        <?php
                        if (Session::get('id_admin') === $eachAdminCommentList->id_admin) {
                        ?>
                        <a href="{{URL::to('/delete-admin-comment/'.$eachAdminCommentList->id_coment)}}">Xóa bình
                            luận</a>
                        <?php
                        }
                        ?>
                    </row>
                @endforeach

                @foreach($commentList as $eachCommentList)
                    <row>
                        <?php
                        $user = DB::table('customer') //chứa coment của ad
                        ->where('id_customer', $eachCommentList->id_customer)
                            ->get()->first();
                        if($user->status == 1){
                        ?>
                        <hr>
                        <h4 style="color: #2b527e">User: {{$eachCommentList->name}}</h4>
                        <?php
                        } else if($user->status == 0){
                        ?>
                        <hr>
                        <h4>
                            <row style="text-decoration: line-through;">User: {{$eachCommentList->name}}</row>
                            banned
                        </h4>
                        <?php
                        }
                        ?>

                        <h5><i class="fa fa-comment" aria-hidden="true"></i> {{$eachCommentList->content}}</h5>
                        <?php
                        if (Session::get('id_admin')) {
                        ?>
                        <a href="{{URL::to('/delete-comment/'.$eachCommentList->id_coment)}}">Xóa bình luận</a>
                        <a href="{{URL::to('/block-user/'.$eachCommentList->id_customer)}}">Block</a>
                        <a href="{{URL::to('/unblock-user/'.$eachCommentList->id_customer)}}">Unblock</a>
                        <?php
                        }
                        ?>
                    </row>
                    <hr>
                    <hr>
                @endforeach
                <h1>Sản phẩm tương đương</h1>
                <div class="row portfolio text-center">
                    <?php
                    $equalProduct = DB::table('product')
                        ->where('id_category_branch', $queryy->id_category_branch)
                        ->take(8)
                        ->get();    //sp tương đương là các sp có cùng branch-category
                    $url = $categoryMainOnly->name . '/' . $categoryBranchOnly->name . '/';

                    foreach ($equalProduct as $eachOfEqualProduct){
                    ?>

                    <div class="col-md-3">
                        <div class="box-image">
                            <div class="image"><img
                                    src="{{ URL::to('/') }}/public/image/{{$url}}{{$eachOfEqualProduct->image}}" alt=""
                                    class="img-fluid">
                                <div class="overlay d-flex align-items-center justify-content-center">
                                    <div class="content">
                                        <div class="name">
                                            <h3><a href="{{URL::to('/detail/'.$eachOfEqualProduct->id_product) }}"
                                                   class="color-white">{{$eachOfEqualProduct->name}}</a></h3>
                                        </div>
                                        <div class="text">
                                            <p class="buttons"><a
                                                    href="{{URL::to('/detail/'.$eachOfEqualProduct->id_product) }}"
                                                    class="btn btn-template-outlined-white">Show Detail</a>
                                                <form action="{{URL::to('/save-cart')}}" method="GET">
                                                    <input type="hidden" name="quantity" value="1"/>
                                                    <input name="productid_hidden" type="hidden"
                                                           value="{{$eachOfEqualProduct->id_product}}"/>
                                            <p class="bottons">
                                                <button type="submit" class="btn btn-template-outlined-white"><i
                                                        class="fa fa-shopping-cart"></i> Add to cart
                                                </button>
                                            </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5>{{$eachOfEqualProduct->name}}</h5>
                        </div>
                    </div>

                    <?php
                    }
                    ?>
                </div>
                <hr>
                <hr>
                <h1>Bài viết liên quan</h1>
                    <?php
                    $equalNews = DB::table('news')
                        ->where('id_product', $queryy->id_product)
                        ->get();
                    foreach ($equalNews as $eachOfEqualNews){
                    ?>
                    <h4 style="color: orangered">
                        <a href="{{URL::to('/detail-news-for-user/'.$eachOfEqualNews->id_news) }}">
                            {{$eachOfEqualNews->title}}
                            ({{$eachOfEqualNews->publish_date}})</a></h4>
                    <?php
                    }
                    ?>
                <h1>So sánh giá giữa các bên cho thuê</h1>
                <div class="row portfolio text-center">
                    <?php
                    $equalProduct = DB::table('product')
                        ->where('name', $queryy->name)
                        ->orderBy('price','DESC')
                        ->take(8)
                        ->get();    //xem các sp giá cạnh tranh nhất
                    $url = $categoryMainOnly->name . '/' . $categoryBranchOnly->name . '/';

                    foreach ($equalProduct as $eachOfEqualProduct){
                    ?>

                    <div class="col-md-3">
                        <div class="box-image">
                            <div class="image"><img
                                    src="{{ URL::to('/') }}/public/image/{{$url}}{{$eachOfEqualProduct->image}}" alt=""
                                    class="img-fluid">
                                <div class="overlay d-flex align-items-center justify-content-center">
                                    <div class="content">
                                        <div class="name">
                                            <h3><a href="{{URL::to('/detail/'.$eachOfEqualProduct->id_product) }}"
                                                   class="color-white">{{$eachOfEqualProduct->name}}</a></h3>
                                        </div>
                                        <div class="text">
                                            <p class="buttons"><a
                                                    href="{{URL::to('/detail/'.$eachOfEqualProduct->id_product) }}"
                                                    class="btn btn-template-outlined-white">Show Detail</a>
                                                <form action="{{URL::to('/save-cart')}}" method="GET">
                                                    <input type="hidden" name="quantity" value="1"/>
                                                    <input name="productid_hidden" type="hidden"
                                                           value="{{$eachOfEqualProduct->id_product}}"/>
                                            <p class="bottons">
                                                <button type="submit" class="btn btn-template-outlined-white"><i
                                                        class="fa fa-shopping-cart"></i> Add to cart
                                                </button>
                                            </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5>{{$eachOfEqualProduct->name}}</h5>
                        </div>
                    </div>

                    <?php
                    }
                    ?>
                </div>
                <h1>Mới nhất đến cũ nhất</h1>
                <div class="row portfolio text-center">
                    <?php
                    $equalProduct = DB::table('product')
                        ->where('name', $queryy->name)
                        ->orderBy('outlook','DESC')
                        ->take(8)
                        ->get();    //xem các sp mới nhất
                    $url = $categoryMainOnly->name . '/' . $categoryBranchOnly->name . '/';

                    foreach ($equalProduct as $eachOfEqualProduct){
                    ?>

                    <div class="col-md-3">
                        <div class="box-image">
                            <div class="image"><img
                                    src="{{ URL::to('/') }}/public/image/{{$url}}{{$eachOfEqualProduct->image}}" alt=""
                                    class="img-fluid">
                                <div class="overlay d-flex align-items-center justify-content-center">
                                    <div class="content">
                                        <div class="name">
                                            <h3><a href="{{URL::to('/detail/'.$eachOfEqualProduct->id_product) }}"
                                                   class="color-white">{{$eachOfEqualProduct->name}}</a></h3>
                                        </div>
                                        <div class="text">
                                            <p class="buttons"><a
                                                    href="{{URL::to('/detail/'.$eachOfEqualProduct->id_product) }}"
                                                    class="btn btn-template-outlined-white">Show Detail</a>
                                                <form action="{{URL::to('/save-cart')}}" method="GET">
                                                    <input type="hidden" name="quantity" value="1"/>
                                                    <input name="productid_hidden" type="hidden"
                                                           value="{{$eachOfEqualProduct->id_product}}"/>
                                            <p class="bottons">
                                                <button type="submit" class="btn btn-template-outlined-white"><i
                                                        class="fa fa-shopping-cart"></i> Add to cart
                                                </button>
                                            </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5>{{$eachOfEqualProduct->name}}</h5>
                        </div>
                    </div>

                    <?php
                    }
                    ?>
                </div>
                <hr>
                <hr>
            </div>
        </div>
    </div>

@endsection
