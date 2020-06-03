<!doctype html>
<html lang="en">
  <head>
    <title>Alease</title>
    <meta name="description" content="">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ URL::to('/') }}/public/frontend/img/rsz_5logo.png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/bootstrap-select/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/owl.carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/owl.carousel/assets/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/style.default.css')}}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend/custom.css')}}">
  </head>
  <body>
  <div id="all">

        <div class="top-bar">
          <div class="container">
            <div class="row d-flex align-items-center">
              <div class="col-md-6 d-md-block d-none">
                <p>Contact us on +111 222 333 444 or hello@alease.com.</p>
              </div>
              <div class="col-md-6">
                <div class="d-flex justify-content-md-end justify-content-between">
                  <ul class="list-inline contact-info d-block d-md-none">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                  </ul>
                    @if(Session::get('login') == false)
                  <div class="login">
                      <a href="{{URL::to('/login')}}" class="login-btn">
                          <i class="fa fa-sign-in"></i>
                          <span class="d-none d-md-inline-block">Sign In</span>
                      </a>
                      <a href="{{URL::to('/signup')}}" class="signup-btn">
                          <i class="fa fa-user"></i>
                          <span class="d-none d-md-inline-block">Sign Up</span>
                      </a>
                  </div>
                    @elseif(Session::get('id_admin'))
                        <div class="login">
                            <?php
                            $nameAdmin = DB::table('admininfo')
                                ->select('name')
                                ->where('id_admin',Session::get('id_admin'))
                                ->get()->first();
                            ?>
                        </div>
                          
                          <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{$nameAdmin->name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{URL::to('/logout')}}">Log out</a>
                              <a class="dropdown-item" href="{{URL::to('/change-information')}}">Profile</a>
                            </div>
                          </div>
                          
                        
                    @elseif(Session::get('id_customer'))
                        <div class="login">
                            <?php
                            $nameCustomer = DB::table('customer')
                                ->select('name')
                                ->where('id_customer',Session::get('id_customer'))
                                ->get()->first();
                            ?>
                  
                        </div>
                        <div class="log out">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{$nameCustomer->name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{URL::to('/logout')}}">Log out</a>
                              <a class="dropdown-item" href="{{URL::to('/change-information')}}">Profile</a>
                              <a class="dropdown-item" href="{{URL::to('/user-view-order')}}">Your Order </a>
                            </div>
                          </div>
                          <!-- <ul class="social-custom list-inline">
                            <li><a href="{{URL::to('/logout')}}">Log out</a></li>
                            <li><a href="{{URL::to('/change-information')}}" class="nav-link">Profile</a></li>
                            <li><a href="{{URL::to('/user-view-order')}}" class="nav-link">Your Order</a></li>   
                          </ul> -->
                        </div>
                    @endif
                  <ul class="social-custom list-inline">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
            <div role="document" class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 id="login-modalLabel" class="modal-title">Customer Login</h4>

                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body"> -->
                 @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                @endif
                  <!-- <p class="text-center text-muted">Not registered yet?</p>
                  <p class="text-center text-muted"><a href="customer-register.html"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
                </div>
              </div>
            </div>
          </div> -->


          <header class="nav-holder make-sticky sticky">
            <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
              <div class="container"><a href="{{URL::to('/home')}}" class="navbar-brand home"><img src="{{ URL::to('/') }}/public/frontend/img/rsz_5logo.png" alt="Alease logo" class="d-none d-md-inline-block"><img src="{{ URL::to('/') }}/public/frontend/img/rsz_11logo.png" alt="Alease logo" class="d-inline-block d-md-none"><span class="sr-only">Alease - go to homepage</span></a>
                <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
                <div id="navigation" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav ml-auto">
                    <!-- ==========Home ===============-->
                    <li class="nav-item dropdown active"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Home <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="{{URL::to('/home')}}" class="nav-link">Home</a></li>
                          <?php
                          $AllCategoryMain = DB::table('category_main')
                              ->get()->take(4);
                          foreach ($AllCategoryMain as $EachOfAllCategoryMain){
                          ?>
                        <li class="dropdown-item"><a href="{{URL::to('/branch-result/'.$EachOfAllCategoryMain->id_category_main)}}" class="nav-link">{{$EachOfAllCategoryMain->name}}</a></li>
                        <?php
                        }
                        ?>
                      </ul>
                    </li>
                      @foreach($AllCategoryMain as $EachOfAllCategoryMain)
                    <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">{{$EachOfAllCategoryMain->name}}<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <?php
                          $AllCategoryBranch = DB::table('category_branch')
                              ->where('id_category_main',$EachOfAllCategoryMain->id_category_main)
                              ->get();
                          ?>
                          @foreach($AllCategoryBranch as $EachOfAllCategoryBranch)
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/'.$EachOfAllCategoryBranch->id_category_branch)}}" class="nav-link">{{$EachOfAllCategoryBranch->name}}</a></li>
                              @endforeach
                      </ul>
                    </li>
                      @endforeach
                    <!-- <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Contact <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="contact.html" class="nav-link">supports</a></li>
                        <li class="dropdown-item"><a href="contact2.html" class="nav-link">Questions</a></li>
                      </ul>
                    </li> -->
                    <!-- @if(Session::has('login') && Session::get('login') == true)
                    <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Acc <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="{{URL::to('/change-information')}}" class="nav-link">Profile</a></li>
                          @if(Session::get('id_customer'))
                         <li class="dropdown-item"><a href="{{URL::to('/user-view-order')}}" class="nav-link">Your Order</a></li>
                          @endif
                        <li class="dropdown-item"><a href="{{URL::to('/logout')}}" class="nav-link">Log Out</a></li>
                      </ul>
                    </li>
                    @endif -->
                    <!-- ========== Contact dropdown end ==================-->
                  </ul>
                </div>
                <div id="search" class="collapse clearfix">
                  <form role="search" class="navbar-form">
                    <div class="input-group">
                      <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                        <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </header>
          <!-- Navbar End-->
        @yield('login')
        @yield('signup')
        @yield('content')
        @yield('category_main')
        @yield('category_branch')
        @yield('product')
        @yield('product_detail')
        @yield('cart')
        @yield('noteDetail')
        @yield('savePayment')
        <!-- FOOTER -->
        <footer class="main-footer">
          <div class="container">
            <div class="row">
              <div class="col-lg-3">
                <h4 class="h6">About Us</h4>
                <p>If you have a problem, please contact us.</p>
                <hr>
                <h4 class="h6">Join Our Monthly Newsletter</h4>
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control">
                    <div class="input-group-append">
                      <button type="button" class="btn btn-secondary"><i class="fa fa-send"></i></button>
                    </div>
                  </div>
                </form>
                <hr class="d-block d-lg-none">
              </div>
              <div class="col-lg-3">
                <h4 class="h6">Blog</h4>
                <ul class="list-unstyled footer-blog-list">
                  <li class="d-flex align-items-center">
                    <div class="image"><img src="{{ URL::to('/') }}/public/frontend/img/rsz_5logo.png" alt="..." class="img-fluid"></div>
                    <div class="text">
                      <h5 class="mb-0"> <a href="post.html">recruit members</a></h5>
                    </div>
                  </li>
                  <li class="d-flex align-items-center">
                    <div class="image"><img src="{{ URL::to('/') }}/public/frontend/img/rsz_5logo.png" alt="..." class="img-fluid"></div>
                    <div class="text">
                      <h5 class="mb-0"> <a href="post.html">No.1 company in the world</a></h5>
                    </div>
                  </li>
                  <!-- <li class="d-flex align-items-center">
                    <div class="image"><img src="{{ URL::to('/') }}/public/frontend/img/rsz_5logo.png" alt="..." class="img-fluid"></div>
                    <div class="text">
                      <h5 class="mb-0"> <a href="post.html">Very very long blog post name</a></h5>
                    </div>
                  </li> -->
                </ul>
                <hr class="d-block d-lg-none">
              </div>
              <div class="col-lg-3">
                <h4 class="h6">Contact</h4>
                <p class="text-uppercase"><strong>Alease Ltd.</strong><br>1 Dai Co Viet <br>Hai Ba Trung <br>Ha Noi <br>VietNamese <br><strong>VietNam</strong></p><a href="contact.html" class="btn btn-template-main">Go to contact page</a>
                <hr class="d-block d-lg-none">
              </div>
              <div class="col-lg-3">
                <ul class="list-inline photo-stream">
                  <li class="list-inline-item"><a src="{{ URL::to('/') }}/public/frontend/img/payment.png" alt="..." class="img-fluid"></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="copyrights">
            <div class="container">
              <div class="row">
                <div class="col-lg-4 text-center-md">
                  <p>&copy; 2020. Alease</p>
                </div>
                <div class="col-lg-8 text-right text-center-md">
                  <!-- Please do not remove the backlink to us unless you purchase the Attribution-free License at https://bootstrapious.com/donate. Thank you. -->
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="{{asset('public/frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('public/frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('public/frontend/vendor/waypoints/lib/jquery.waypoints.min.js')}}"> </script>
    <script src="{{asset('public/frontend/vendor/jquery.counterup/jquery.counterup.min.js')}}"> </script>
    <script src="{{asset('public/frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{asset('public/frontend/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('public/frontend/vendor/jquery.scrollto/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/front.js')}}"></script>

  </body>
</html>
