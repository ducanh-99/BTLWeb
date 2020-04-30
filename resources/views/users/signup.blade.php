
    <div class="signup-form"><!--sign up form-->
        <h2>Đăng ký</h2>
        <form action="{{URL::to('/signup-check')}}" method="GET">
            <input type="text" name="customer_name" placeholder="Họ và tên"/>
            <input type="email" name="customer_email" placeholder="Địa chỉ email"/>
            <input type="password" name="customer_password" placeholder="Mật khẩu"/>
            <input type="text" name="customer_phone" placeholder="Phone"/>
            <input type="text" name="customer_address" placeholder="Địa chỉ"/>
            <input type="text" name="customer_credit" placeholder="Credit"/>
            <button type="submit" class="btn btn-default">Đăng ký</button>
        </form>
    </div><!--/sign up form-->
