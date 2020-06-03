@extends('welcome')
@section('noteDetail')
<!-- <div class="register-req">
    <p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
</div>/register-req -->
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
                <h1 class="h2">Checkout - Address</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb d-flex justify-content-end">
                    <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Checkout - Address</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            <div id="checkout" class="col-lg-9">
                <div class="box border-bottom-0">
                    <form action="{{URL::to('/save-customer-payment')}}" method="GET">
                        <div>
                            <input type="hidden" value="{{$customerInformation->id_customer}}" name="id_customer">
                        </div>
                        <div>
                            Email người nhận
                            <input type="text" name="shipping_email" placeholder="Email" value="{{$customerInformation->email}}">
                        </div>
                        <div>
                            Tên người nhận
                            <input type="text" name="shipping_name" placeholder="Họ và tên" value="{{$customerInformation->name}}">
                        </div>
                        <div>
                            Địa chỉ nhận hàng (Không điền nếu quý khách nhận tại cửa hàng):
                            <input type="text" name="shipping_address" placeholder="Địa chỉ" value="{{$customerInformation->address}}">
                        </div>
                        <div>
                            Số điện thoại
                            <input type="text" name="shipping_phone" placeholder="Phone" value="{{$customerInformation->phone_number}}">
                        </div>
                        <div>
                            Ghi chú
                            <textarea name="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="8" cols="50"></textarea>
                        </div>
                        <div>
                            Tỉnh thành
                            <input name="shipping_province" type="text" placeholder="Tỉnh thành">
                        </div>
                        <span>
                            <label><input name="payment_option" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
                        </span>
                        <span>
                            <label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt</label>
                        </span>
                        <span>
                            <label><input name="payment_option" value="3" type="checkbox"> Thanh toán thẻ ghi nợ</label>
                        </span>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>

                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>Discount</th>
                                    <th>Temp Total</th>
                                    <th>Months</th>
                                    <th>Partner Delivery</th>
                                    <th>Shipping Method</th>
                                    </tr>
                                </thead>
                                <?php $content = Cart::content();
                                $i = 0; ?>
                                @foreach($content as $eachContentItem)
                                <?php
                                $i++;
                                ?>
                                <tr>
                                    <?php
                                    $produc = DB::table('product')->where('id_product', $eachContentItem->id)->get()->first();
                                    $categoryBranchOnly = DB::table('category_branch')->where('id_category_branch', $produc->id_category_branch)->get()->first();   //chứa 1 bản ghi trong bảng branch
                                    $categoryMainOnly = DB::table('category_main')->where('id_category_main', $categoryBranchOnly->id_category_main)->get()->first();
                                    ?>
                                    <td><a href="{{URL::to('/detail/'.$eachContentItem->id_product) }}"><img src="{{ URL::to('/') }}/public/image/{{$categoryMainOnly->name}}/{{$categoryBranchOnly->name}}/{{$produc->image}}" class="img-fluid"></a></td>
                                    <td>{{$eachContentItem->name}}</td>
                                    <td>{{$eachContentItem->qty}}</td>
                                    <td>{{'$'.number_format($eachContentItem->price)}}</td>
                                    <td></td>
                                    <td>{{'$'.number_format($eachContentItem->price * $eachContentItem->qty)}}</td>
                                    <td><input type="number" min="1" name="months[{{$i}}]" id="months[{{$i}}]" placeholder="Số tháng"></td>
                                    <td>
                                        <select id="partner_delivery" name="partner_delivery" style="float: left;">
                                            <?php
                                            $delivery = DB::table('partner_delivery')->get();
                                            ?>
                                            @foreach($delivery as $eachOfDelivery)
                                            <option>
                                                {{$eachOfDelivery->id_partner_delivery}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select id="shipping_method" name="shipping_method" style="float: left;">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                        <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
                    </form>
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
                                    <td>Shipping fee</td>
                                    <th>{{"$."}}</th>
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
        </div>
    </div>
</div>


<!-- <div class="shopper-informations">
    <div class="row">
        <div class="col-sm-12 clearfix">
            <div class="bill-to">
                <p>Điền thông tin người nhận hàng</p>
                <div class="form-one">
                    <form action="{{URL::to('/save-customer-payment')}}" method="GET">
                        <div>
                            <input type="hidden" value="{{$customerInformation->id_customer}}" name="id_customer">
                        </div>
                        <div>
                            Email người nhận
                            <input type="text" name="shipping_email" placeholder="Email" value="{{$customerInformation->email}}">
                        </div>
                        <div>
                            Tên người nhận
                            <input type="text" name="shipping_name" placeholder="Họ và tên" value="{{$customerInformation->name}}">
                        </div>
                        <div>
                            Địa chỉ nhận hàng (Không điền nếu quý khách nhận tại cửa hàng):
                            <input type="text" name="shipping_address" placeholder="Địa chỉ" value="{{$customerInformation->address}}">
                        </div>
                        <div>
                            Số điện thoại
                            <input type="text" name="shipping_phone" placeholder="Phone" value="{{$customerInformation->phone_number}}">
                        </div>
                        <div>
                            Ghi chú
                            <textarea name="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="8" cols="50"></textarea>
                        </div>
                        <div>
                            Tỉnh thành
                            <input name="shipping_province" type="text" placeholder="Tỉnh thành">
                        </div>


                        <span>
                            <label><input name="payment_option" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
                        </span>
                        <span>
                            <label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt</label>
                        </span>
                        <span>
                            <label><input name="payment_option" value="3" type="checkbox"> Thanh toán thẻ ghi nợ</label>
                        </span>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>

                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>Discount</th>
                                    <th>Temp Total</th>
                                    <th>Months</th>
                                    <th>Partner Delivery</th>
                                    <th>Shipping Method</th>
                                    </tr>
                                </thead>
                                <?php $content = Cart::content();
                                $i = 0; ?>
                                @foreach($content as $eachContentItem)
                                <?php
                                $i++;
                                ?>
                                <tr>
                                    <?php
                                    $produc = DB::table('product')->where('id_product', $eachContentItem->id)->get()->first();
                                    $categoryBranchOnly = DB::table('category_branch')->where('id_category_branch', $produc->id_category_branch)->get()->first();   //chứa 1 bản ghi trong bảng branch
                                    $categoryMainOnly = DB::table('category_main')->where('id_category_main', $categoryBranchOnly->id_category_main)->get()->first();
                                    ?>
                                    <td><a href="{{URL::to('/detail/'.$eachContentItem->id_product) }}"><img src="{{ URL::to('/') }}/public/image/{{$categoryMainOnly->name}}/{{$categoryBranchOnly->name}}/{{$produc->image}}" class="img-fluid"></a></td>
                                    <td>{{$eachContentItem->name}}</td>
                                    <td>{{$eachContentItem->qty}}</td>
                                    <td>{{'$'.number_format($eachContentItem->price)}}</td>
                                    <td></td>
                                    <td>{{'$'.number_format($eachContentItem->price * $eachContentItem->qty)}}</td>
                                    <td><input type="number" min="1" name="months[{{$i}}]" id="months[{{$i}}]" placeholder="Số tháng"></td>
                                    <td>
                                        <select id="partner_delivery" name="partner_delivery" style="float: left;">
                                            <?php
                                            $delivery = DB::table('partner_delivery')->get();
                                            ?>
                                            @foreach($delivery as $eachOfDelivery)
                                            <option>
                                                {{$eachOfDelivery->id_partner_delivery}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select id="shipping_method" name="shipping_method" style="float: left;">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                        <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
                    </form>
                </div>

            </div>
        </div>

    </div>
</div> -->

=======
@endsection