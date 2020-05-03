<<<<<<< HEAD
<div><!--login form-->
    <h2>Đăng nhập tài khoản</h2>
    <form action="{{URL::to('/login-check')}}" method="GET">
        <input type="text" name="email_account" placeholder="Tài khoản"/>
        <input type="password" name="password_account" placeholder="Password"/>
        <input type="checkbox" name="isAdmin" id="isAdmin"><label for="isAdmin">Tôi là admin</label>
        <span>
								<input type="checkbox" class="checkbox">
								Ghi nhớ đăng nhập
							</span>
        <button type="submit" class="btn btn-default">Đăng nhập</button>
    </form>
</div><!--/login form-->
=======

                <form action="{{URL::to('/login-check')}}" method="get">
                    <div class="form-group">
                      <input id="email_modal" name="email_account" type="text" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                      <input id="password_modal"name="password_account" type="password" placeholder="password" class="form-control">
                    </div>
                    <p class="text-center">
                      <button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
                    </p>
                </form>
>>>>>>> 4a7a276a730d55c51154f9f38a56162c740d034a
