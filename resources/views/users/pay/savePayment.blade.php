<section id="cart_items">
    <div class="container">

        <div class="review-payment">
            <>Cảm ơn quý khách {{$shipping_name}} đã cho ALEASE cơ hội được phục vụ. Trong 10 phút, nhân viên ALEASE sẽ gửi tin nhắn hoặc gọi
            điện xác nhận giao hàng cho quý khách</h2>
        </div>

        <h3>Thông tin đặt hàng:</h3>
        <ul>
            <li>Địa chỉ nhận hàng: <span>{{$shipping_address}}</span></li>
            <li>ID Người đặt hàng: <span>{{$id_customer}}</span></li>
            <li>Email người nhận hàg: <span>{{$shipping_email}}</span></li>
            <li>Số điện thoại người nhận hàng: <span>{{$shipping_phone}}</span></li>
            <li>Ghi chú: <span>{{$shipping_notes}}</span></li>
            <li>Phương thức thanh toán: <span>{{$payment_option}}</span></li>
        </ul>
        <h1>Sản phẩm đã mua</h1>

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
                                <p>{{$eachContentItem->qty}}</p>
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
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                            <ul>
                                <li>Tổng <span>{{Cart::subTotal().' '.'vnđ'}}</span></li>
                                <li>Thuế <span>{{Cart::tax().' '.'vnđ'}}</span></li>
                                <li>Khuyến mại <span>{{Cart::discount().' '.'vnđ'}}</span></li>
                                <li>Thành tiền <span>{{Cart::total().' '.'vnđ'}}</span></li>
                                {{Cart::destroy()}}
                            </ul>



    </div>
</section> <!--/#cart_items-->
