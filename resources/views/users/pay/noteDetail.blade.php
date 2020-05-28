<div class="register-req">
    <p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
</div><!--/register-req-->

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

