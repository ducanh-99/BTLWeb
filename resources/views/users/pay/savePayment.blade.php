<section id="cart_items">
    @extends('welcome')
    @section('savePayment')
    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row d-flex align-items-center flex-wrap">
                <div class="col-md-7">
                    <h1 class="h2">Done</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Thank you</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <section id="cart_items">
        <div class="container">

            <div class="review-payment">
                <h2>
                    Thank you {{$shipping_name}} for giving ALEASE the opportunity to serve. In 10 minutes, ALEASE staff will send you a message or call to confirm delivery of the goods to you
                </h2>
            </div>

            <h3>Order information:</h3>
            <ul>
                <li>Shipping address: <span>{{$shipping_address}}</span></li>
                <?php
                $custome = DB::table('customer')->where('id_customer', $id_customer)->get()->first();
                ?>
                <li>Receiver Name: <span>{{$custome->name}}</span></li>
                <li>Receiver Email: <span>{{$shipping_email}}</span></li>
                <li>Phone Number: <span>{{$shipping_phone}}</span></li>
                <li>Note: <span>{{$shipping_notes}}</span></li>
                <li>Payment method: <span>{{$payment_option}}</span></li>
            </ul>
            <h1>Purchased product:</h1>

            <?php
            $content = Cart::content(); //lấy nội dung của giỏ hàng
            //gồm id, qty, name, price, weight, option/image
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <th>Image</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Months</th>
                        <th>Partner Delivery</th>
                        <th>Shipping fee</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $deposit = array();
                    $i = 0; ?>
                    @foreach($content as $eachContentItem) {{--duyệt tất cả sản phẩm trong giỏ hàng--}}
                    <tr>
                        <?php
                        $produc = DB::table('product')->where('id_product', $eachContentItem->id)->get()->first();
                        ?>
                        <?php
                        $produc = DB::table('product')->where('id_product', $eachContentItem->id)->get()->first();
                        $categoryBranchOnly = DB::table('category_branch')->where('id_category_branch', $produc->id_category_branch)->get()->first();   //chứa 1 bản ghi trong bảng branch
                        $categoryMainOnly = DB::table('category_main')->where('id_category_main', $categoryBranchOnly->id_category_main)->get()->first();
                        ?>
                        <td><a href="{{URL::to('/detail/'.$eachContentItem->id_product) }}"><img src="{{ URL::to('/') }}/public/image/{{$categoryMainOnly->name}}/{{$categoryBranchOnly->name}}/{{$produc->image}}" class="img-fluid"></a></td>
                        <td>{{$eachContentItem->name}}</td>

                        <td class="cart_quantity">
                            <p>{{$eachContentItem->qty}}</p>
                        </td>

                        <td class="cart_price">
                            <p>{{number_format($eachContentItem->price).' '.'$'}}</p>
                        </td>
                        <td>{{Cart::discount()}}</td>
                        <td class="cart_total">
                            <p class="cart_total_price">

                                <?php
                                $subtotal = $eachContentItem->price * $eachContentItem->qty;
                                echo number_format($subtotal) . ' ' . '$';
                                ?>
                            </p>
                        </td>
                        <td>
                            <p>{{($month[$i])}}</p>
                        </td>
                        <td>{{DB::table('partner_delivery')->where('id_partner_delivery',$id_partner_delivery[$i])->get()->first()->name}}</td>
                        <td>{{$shipping_fees[$i]}}</td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
            <br>
            <ul>
                <li>Sub total <span>{{Cart::subTotal().' '.'$'}}</span></li>
                <li>Tax <span>{{Cart::tax().' '.'$'}}</span></li>
                <li><span>{{Cart::discount().' '.'$'}}</span></li>
                <li>Total<span>{{$totalcost.' '.'$'}}</span></li>
                {{Cart::destroy()}}
            </ul>


        </div>
    </section>
    <!--/#cart_items-->

    @endsection