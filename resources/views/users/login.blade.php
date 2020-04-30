<div><!--login form-->
    <h2>Đăng nhập tài khoản</h2>
    <form action="{{URL::to('/login-check')}}" method="GET">
        <input type="text" name="email_account" placeholder="Tài khoản"/>
        <input type="password" name="password_account" placeholder="Password"/>
        <span>
								<input type="checkbox" class="checkbox">
								Ghi nhớ đăng nhập
							</span>
        <button type="submit" class="btn btn-default">Đăng nhập</button>
    </form>
</div><!--/login form-->
