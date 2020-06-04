
@extends('welcome')
@section('login')
<!--login form-->
<!-- <div>
    
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
</div> -->
<!--/login form-->
<!-- test -->


<div id="heading-breadcrumbs">
<div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Signin</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Home</a></li>
                <li class="breadcrumb-item active">Sign In</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
</div>
      <div id="content">
        <div class="container">
          @if(isset($check))
          <br/>
          <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
              <!-- <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong id="alert-header">Chưa lấy được</strong>
              </div> -->
              @if($check == false)
              <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong style="text-align: center">{{$alert}}</strong>
              </div>
              @endif
              </div>
          </div>
          @endif
         <div class="row">
         <div class="col-lg-4"></div>
         <div class="col-lg-4">
              <div class="box">               
                <h2 class="text-uppercase text-center">Login</h2>              
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
      </div>
@endsection