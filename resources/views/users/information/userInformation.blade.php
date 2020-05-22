<p>Thay đổi thông tin cá nhân</p>
<div class="form-one">
    <form action="{{URL::to('/alter-user-information')}}" method="GET">
        <input type="hidden" value="{{$customerInformation->id_customer}}" name="id" >
        <input type="text" name="email" placeholder="Email" value="{{$customerInformation->email}}">
        <input type="text" name="name" placeholder="Họ và tên" value="{{$customerInformation->name}}">
        <input type="text" name="address" placeholder="Địa chỉ" value="{{$customerInformation->address}}">
        <input type="text" name="password" placeholder="Phone" value="{{$customerInformation->password}}">
        <input type="text" name="phone_number" placeholder="Email" value="{{$customerInformation->phone_number}}">
        <input type="text" name="credit" placeholder="Địa chỉ" value="{{$customerInformation->credit}}">
        <input type="submit" value="Xác nhận" name="send_order_place" class="btn btn-primary btn-sm">
    </form>
</div>
<p>Lịch sử đơn hàng</p>
