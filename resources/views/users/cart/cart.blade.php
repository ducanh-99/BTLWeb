<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php

            $content = Cart::content(); //lấy nội dung của giỏ hàng
            //gồm id, qty, name, price, weight, option/image

            ?>
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
                @foreach($content as $eachContentItem)  {{--duyệt tất cả sản phẩm trong giỏ hàng--}}
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
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">

        <div class="row">

            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng <span>{{Cart::subTotal().' '.'vnđ'}}</span></li>
                        <li>Thuế <span>{{Cart::tax().' '.'vnđ'}}</span></li>
                        <li>Khuyến mại <span>{{Cart::discount().' '.'vnđ'}}</span></li>
                        <li>Thành tiền <span>{{Cart::total().' '.'vnđ'}}</span></li>
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
</section><!--/#do_action-->
