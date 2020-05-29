@extends('welcome')
@section('cart')
    <section id="cart_items">
        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row d-flex align-items-center flex-wrap">
                    <div class="breadcrumbs">
                        <ul class="breadcrumb d-flex justify-content-end">
                            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                            <li class="breadcrumb-item">Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php
            $content = Cart::content(); //lấy nội dung của giỏ hàng
            //gồm id, qty, name, price, weight, option/image
            $numberOfItems = 0;
            foreach ($content as $eachItem) {
                $numberOfItems += $eachItem->qty;
            }
            ?>
            <div class="row bar">
                <div class="col-lg-12">
                    <p class="text-muted lead">You currently have {{$numberOfItems}} item(s) in your cart.</p>
                </div>
                <div id="basket" class="col-lg-9">
                    <div class="box mt-0 pb-0 no-horizontal-padding">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>

                                <th>Image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit price</th>
                                <th>Discount</th>
                                <th>Temp Total</th>
                                <th>Xóa</th>
                                </tr>
                                </thead>
                                @foreach($content as $eachContentItem)
                                    <tr>
                                        <?php
                                        $produc = DB::table('product')->where('id_product',$eachContentItem->id)->get()->first();
                                        $categoryBranchOnly = DB::table('category_branch')->where('id_category_branch',$produc->id_category_branch)->get()->first();   //chứa 1 bản ghi trong bảng branch
                                        $categoryMainOnly = DB::table('category_main')->where('id_category_main',$categoryBranchOnly->id_category_main)->get()->first();
                                        ?>
                                        <td><a href="{{URL::to('/detail/'.$eachContentItem->id_product) }}"><img
                                                    src="{{ URL::to('/') }}/public/image/{{$categoryMainOnly->name}}/{{$categoryBranchOnly->name}}/{{$produc->image}}"
                                                    class="img-fluid"></a></td>
                                            <td>{{$eachContentItem->name}}</td>
                                        <td>
                                            <form action="{{URL::to('/update-cart-quantity')}}" method="GET">
                                                <input type="number" name="quantity" value="{{$eachContentItem->qty}}">
                                                <input type="hidden" value="{{$eachContentItem->rowId}}" name="id" class="form-control">
                                                <input type="submit" value="Update Qty" name="update_qty" class="btn btn-default btn-sm">
                                            </form>
                                        </td>
                                        <td>{{'$'.number_format($eachContentItem->price)}}</td>
                                        <td>$0.00</td>
                                        <td>{{'$'.number_format($eachContentItem->price * $eachContentItem->qty)}}</td>
                                        <td><a href="{{URL::to('/delete-from-cart/'.$eachContentItem->rowId)}}"><i
                                                    class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="box-footer d-flex justify-content-between align-items-center">
                            <div class="left-col"><a href="{{URL::to('/home')}}" class="btn btn-secondary mt-0"><i
                                        class="fa fa-chevron-left"></i> Continue shopping</a></div>
                            <div class="right-col">
                                <!-- <button class="btn btn-secondary"><i class="fa fa-refresh"></i> Update cart</button> -->
                                <?php
                                $href = "";
                                $id_customer = Session::get('id_customer');
                                if ($id_customer != NULL) {
                                    $href = "pay";
                                } else {
                                    $href = "login";
                                }
                                ?>
                                <a class="btn btn-template-outlined" href= {{URL::to($href)}}>Proceed to checkout <i
                                        class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div id="order-summary" class="box mt-0 mb-4 p-0">
                        <div class="box-header mt-0">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have
                            entered.</p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Order subtotal</td>
                                    <th>{{"$".Cart::subTotal()}}</th>
                                </tr>
                                <tr>
                                    <td>Shipping and handling</td>
                                    <th>$0.00</th>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <th>{{"$".Cart::tax()}}</th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th>{{"$".Cart::total()}}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <!-- <div class="table-responsive cart_info">


            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Hình ảnh</td>
                    <td class="description">Tên sp</td>
                    <td class="ID">ID sp</td>
                    <td class="price">Giá</td>
                    <td class="quantity">Số lượng</td>
                    <td class="total">Tổng</td>
                    <td>Row ID</td>
                </tr>
                </thead>
                <tbody>
                @foreach($content as $eachContentItem)
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="{{URL::to('public/uploads/product/'.$eachContentItem->options->image)}}"
                                        width="90" alt=""/></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{$eachContentItem->name}}</a></h4>
                    </td>
                    <td class="cart_ID">
                        <p>{{number_format($eachContentItem->id)}}</p>
                    </td>
                    <td class="cart_price">
                        <p>{{number_format($eachContentItem->price).' '.'vnđ'}}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <form action="{{URL::to('/update-cart-quantity')}}" method="GET">
                                <input class="cart_quantity_input" type="text" name="quantity"
                                       value="{{$eachContentItem->qty}}">
                                <input type="hidden" value="{{$eachContentItem->rowId}}" name="id" class="form-control">
                                <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                            </form>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">

                            <?php
                $subtotal = $eachContentItem->price * $eachContentItem->qty;
                echo number_format($subtotal) . ' ' . 'vnđ';
                ?>
                    </p>
                </td>
                <td>
                    <p>{{($eachContentItem->rowId)}}</p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete"
                           href="{{URL::to('/delete-from-cart/'.$eachContentItem->rowId)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div> -->

            </div>
        </div>

    </section> <!--/#cart_items-->

    <!-- <section id="do_action">
    <div class="container">

        <div class="row">

            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Sub Total: <span>{{"$".Cart::subTotal()}}</span></li>
                        <li>Tax: <span>{{Cart::tax().' '.'vnđ'}}</span></li>
                        <li>Discount: <span>{{Cart::discount().' '.'vnđ'}}</span></li>
                        <li>Total: <span>{{Cart::total().' '.'vnđ'}}</span></li>
                    </ul>
                    {{-- 	<a class="btn btn-default update" href="">Update</a> --}}
    <?php
    $id_customer = Session::get('id_customer');
    if($id_customer != NULL){
    ?>

        <a class="btn btn-default check_out" href="{{URL::to('/pay')}}">Thanh toán</a>
                    <?php

    } else{

    ?>

        <a class="btn btn-default check_out" href="{{URL::to('/login')}}">Thanh toán</a>
                    <h5>Bạn cần đăng nhập để thực hiện chức năng này</h5>
                    <?php
    }
    ?>


        </div>
    </div>
</div>
</div>
</section>/#do_action -->
@endsection
