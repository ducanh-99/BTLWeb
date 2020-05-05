<p>Thay đổi thông tin cá nhân dành cho Admin</p>
<div class="form-one">
    <form action="{{URL::to('/alter-admin-information')}}" method="GET">
        <input type="hidden" value="{{$adminInformation->id_admin}}" name="id" >
        <input type="text" name="name" placeholder="Họ và tên" value="{{$adminInformation->name}}">
        <input type="file" name="avatar" id="avatar" value="{{$adminInformation->avatar}}">
        <input type="text" name="email" placeholder="Email" value="{{$adminInformation->email}}">
        <input type="text" name="address" placeholder="Địa chỉ" value="{{$adminInformation->address}}">
        <input type="text" name="password" placeholder="Phone" value="{{$adminInformation->password}}">
        <input type="text" name="phone_number" placeholder="Email" value="{{$adminInformation->phone_number}}">
        <input type="text" name="credit" placeholder="Địa chỉ" value="{{$adminInformation->credit}}">
        <input type="text" name="job" placeholder="Vị trí" value="{{$adminInformation->job}}">
        <input type="submit" value="Xác nhận" name="send_order_place" class="btn btn-primary btn-sm">
    </form>
</div>
