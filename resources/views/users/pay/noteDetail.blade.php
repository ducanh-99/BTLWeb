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
                </div>
            </div>
            <div class="col-lg-3">
                <div id="order-summary" class="box mt-0 mb-4 p-0">
                    <div class="box-header mt-0">
                        <h3>Order summary</h3>
                    </div>
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
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
        </div>
    </div>
</div>


<div class="shopper-informations">
    <div class="row">

        <div class="col-sm-12 clearfix">
            <div class="bill-to">
                <p>Điền thông tin người nhận hàng</p>
                <div class="form-one">
                    <form action="{{URL::to('/save-customer-payment')}}" method="GET">
                        <input type="hidden" value="{{$customerInformation->id_customer}}" name="id_customer" >
                        <input type="text" name="shipping_email" placeholder="Email" value="{{$customerInformation->email}}">
                        <input type="text" name="shipping_name" placeholder="Họ và tên" value="{{$customerInformation->name}}">
                        <input type="text" name="shipping_address" placeholder="Địa chỉ" value="{{$customerInformation->address}}">
                        <input type="text" name="shipping_phone" placeholder="Phone" value="{{$customerInformation->phone_number}}">
                        <textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
                        <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">

					<span>
						<label><input name="payment_option" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
					</span>
                            <span>
						<label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt</label>
					</span>
                            <span>
						<label><input name="payment_option" value="3" type="checkbox"> Thanh toán thẻ ghi nợ</label>
					</span>
                            <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

<<<<<<< HEAD
=======
@endsection
>>>>>>> 2524e689c9861e9c3664e0485c68048b6b6ff84e
