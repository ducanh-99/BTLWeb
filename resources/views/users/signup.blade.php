
@extends('welcome')
@section('signup')
   <!--sign up form-->
    <!-- <div class="signup-form">
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
    </div> -->
    <!--/sign up form-->

<!-- Test -->

<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">New Account / Sign In</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Home</a></li>
                <li class="breadcrumb-item active">New Account / Sign In</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="box">
                <h2 class="text-uppercase">New account</h2>
                <p class="lead">Not our registered customer yet?</p>
                <!-- <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p> -->
                <hr>
                <form action="{{URL::to('/signup-check')}}" method="get">
                  <div class="form-group">
                    <label for="name-login">Name</label>
                    <input id="name-login" name="customer_name" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email-login">Email</label>
                    <input id="email-login" name="customer_email" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password-login">Password</label>
                    <input id="password-login" name="customer_password" type="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="phone-login">Phone-number</label>
                    <input id="phone-login" name="customer_phone" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="address-login">Address</label>
                    <input id="address-login" name="customer_address" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="credit-login">Credit</label>
                    <input id="credit-login" name="customer_credit" type="text" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i> Register</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box">
                <h2 class="text-uppercase">Login</h2>
                <p class="lead">Already our customer?</p>
                <!-- <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p> -->
                <hr>
                <form action="{{URL::to('/login-check')}}" method="get">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email_account" class="form-control" placeholder="Tài khoản"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password_account" placeholder="Password" class="form-control"/>
                </div>
                <input type="checkbox" name="isAdmin" id="isAdmin"><label for="isAdmin">Admin</label>
                            <span>
								<input type="checkbox" class="checkbox">
								Login Remember
							</span>
                  <div class="text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection