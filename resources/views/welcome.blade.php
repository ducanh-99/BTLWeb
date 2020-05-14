<!doctype html>
<html lang="en">
  <head>
    <title>Alease</title>
    <meta name="description" content="">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        @if(!Session::has('login') && Session::get('login') == false)
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
                  <div class="login"><a href="{{URL::to('/login')}}" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Sign In</span></a><a href="{{URL::to('/signup')}}" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Sign Up</span></a></div>
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
        @endif
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
              <div class="container"><a href="{{URL::to('/home')}}" class="navbar-brand home"><img src="{{ URL::to('/') }}/public/frontend/img/rsz_5logo.png" alt="Alease logo" class="d-none d-md-inline-block"><img src="{{('public/frontend/img/rsz_11logo.png')}}" alt="Alease logo" class="d-inline-block d-md-none"><span class="sr-only">Alease - go to homepage</span></a>
                <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
                <div id="navigation" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav ml-auto">
                    <!-- ==========Home ===============-->
                    <li class="nav-item dropdown active"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Home <b class="caret"></b></a>
                      <ul class="dropdown-menu"> 
                      <li class="dropdown-item"><a href="{{URL::to('/home')}}" class="nav-link">Home</a></li>
                        <li class="dropdown-item"><a href="index2.html" class="nav-link">Application</a></li>
                        <li class="dropdown-item"><a href="index3.html" class="nav-link">Startup</a></li>
                        <li class="dropdown-item"><a href="index4.html" class="nav-link">Agency</a></li>
                      </ul> 
                    </li> 
                    <!-- ==========TV & Audio ===============-->
                    <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">TV & Audio<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/10')}}" class="nav-link">DVD, Blu-ray Players & Set-top Boxes</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/9')}}" class="nav-link">Soundbars, Audio & TV Stands</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/8')}}" class="nav-link">TVs</a></li>
                      </ul>
                    </li>                   
                    <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Technology<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/12')}}" class="nav-link">Computing</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/11')}}" class="nav-link">Gaming</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/13')}}" class="nav-link">Mobile Phones</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/14')}}" class="nav-link">Tablets</a></li>
                      </ul>
                    </li>    
                    <!-- ========== Furniture ==================-->
                    <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Furniture<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/20')}}" class="nav-link">Bedroom Furniture</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/15')}}" class="nav-link">Crushed Velvet Sofas</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/18')}}" class="nav-link">Dining Room</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/16')}}" class="nav-link">Fabric Sofas</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/17')}}" class="nav-link">Leather Sofas</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/19')}}" class="nav-link">Beds</a></a></li>
                      </ul>
                    </li>
                    <!-- ========== Application ==================-->
                    <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Application <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/7')}}" class="nav-link">Floorcare</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/6')}}" class="nav-link">Dishwashers</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/5')}}" class="nav-link">Cookers & Microwaves</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/4')}}" class="nav-link">Fridges & Freezers</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/3')}}" class="nav-link">Tumble Dryers</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/2')}}" class="nav-link">Washer Dryers</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/product-result/1')}}" class="nav-link">Washing Machine</a></li>
                      </ul>
                    </li>
                    <!-- <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Contact <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="contact.html" class="nav-link">supports</a></li>
                        <li class="dropdown-item"><a href="contact2.html" class="nav-link">Questions</a></li>
                      </ul>
                    </li> -->
                    @if(Session::has('login') && Session::get('login') == true)
                    <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Account <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="contact.html" class="nav-link">Profile</a></li>
                        <li class="dropdown-item"><a href="{{URL::to('/logout')}}" class="nav-link">Log Out</a></li>
                      </ul>
                    </li>
                    @endif
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
                  <li class="list-inline-item"><img src="{{ URL::to('/') }}/public/frontend/img/payment.png" alt="..." class="img-fluid"></a></li>
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