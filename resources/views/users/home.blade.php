@extends('welcome')
@section('content')
<section style="background: url('public/frontend/img/photogrid.jpg') center center repeat; background-size: cover;" class="bar background-white relative-positioned">
  <div class="container">
    <!-- Carousel Start-->
    <div class="home-carousel">
      <div class="dark-mask mask-primary"></div>
      <div class="container">
        <div class="homepage owl-carousel">
          <div class="item">
            <div class="row">
              <div class="col-md-5 text-right">
                <h1>Essential family furniture</h1>
                <p>Essential household items</p>
              </div>
              <div class="col-md-7"><img src="img/1-main-image-PAR01.jpg" alt="" class="img-fluid  "></div>
            </div>
          </div>
          <!-- <div class="item">
                      <div class="row">
                        <div class="col-md-7 text-center"><img src="img/template-mac.png" alt="" class="img-fluid"></div>
                        <div class="col-md-5">
                          <h2>46 HTML pages full of features</h2>
                          <ul class="list-unstyled">
                            <li>Sliders and carousels</li>
                            <li>4 Header variations</li>
                            <li>Google maps, Forms, Megamenu, CSS3 Animations and much more</li>
                            <li>+ 11 extra pages showing template features</li>
                          </ul>
                        </div>
                      </div>
                    </div> -->
          <div class="item">
            <div class="row">
              <div class="col-md-5 text-right">
                <h1>Easily decorate your home</h1>
                <ul class="list-unstyled">
                  <li>Diverse products</li>
                  <li>Many different prices</li>
                </ul>
              </div>
              <div class="col-md-7"><img src="img/template-easy-customize.png" alt="" class="img-fluid"></div>
            </div>
          </div>
          <!-- <div class="item">
                      <div class="row">
                        <div class="col-md-7"><img src="img/template-easy-code.png" alt="" class="img-fluid"></div>
                        <div class="col-md-5">
                          <h1>Easy to customize</h1>
                          <ul class="list-unstyled">
                            <li>7 preprepared colour variations.</li>
                            <li>Easily to change fonts</li>
                          </ul>
                        </div>
                      </div>
                    </div> -->
        </div>
      </div>
    </div>
    <!-- Carousel End-->
  </div>


</section>
<section class="bar background-white">
  <div class="container text-center">
    <div class="heading text-center">
      <h2>Why choose us?</h2>
    </div>
    <p class="lead">6 Good reasons & exceptional service with a smile!</p>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="box-simple">
          <div class="icon-outlined"><i class="	fa fa-dollar"></i></div>
          <h3 class="h4">Saving</h3>
          <p>Save money on buying goods and still be able to experience the latest gadgets and technology</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="box-simple">
          <div class="icon-outlined"><i class="fa fa-home"></i></div>
          <h3 class="h4">Home</h3>
          <p>We come to you. Home rental support, customers do not need to go to the store to order. Customers can order online on the web.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="box-simple">
          <div class="icon-outlined"><i class="fa fa-globe"></i></div>
          <h3 class="h4">International</h3>
          <p>The company has many stores in many countries. Customers can order in different countries.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="box-simple">
          <div class="icon-outlined"><i class="fa fa-ambulance"></i></div>
          <h3 class="h4">Delivery</h3>
          <p>Economical, intelligent delivery service. Ensure goods are delivered to customers as quickly as possible and cheap</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="box-simple">
          <div class="icon-outlined"><i class="fa fa-phone"></i></div>
          <h3 class="h4">Support</h3>
          <p>The company supports direct advice to customers 24/7. Customers can call directly, or send mail to receive support</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="box-simple">
          <div class="icon-outlined"><i class="fa fa-user"></i></div>
          <h3 class="h4">People</h3>
          <p>The company's staff are enthusiastic people, dedicated to the job. Serving satisfied customers is our pleasure</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ============================== -->
<section class="bar background-pentagon no-mb text-md-center">
  <div class="container">
    <!-- <div class="heading text-center">
              <h2>Testimonials</h2>
            </div>
            <p class="lead">We have worked with many clients and we always like to hear they come out from the cooperation happy and satisfied. Have a look what our clients said about us.</p> -->
    <!-- Carousel Start-->
    <!-- <ul class="owl-carousel testimonials list-unstyled equal-height">
              <li class="item">
                <div class="testimonial d-flex flex-wrap">
                  <div class="text">
                    <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
                  </div>
                  <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                    <div class="icon"><i class="fa fa-quote-left"></i></div>
                    <div class="testimonial-info d-flex">
                      <div class="title">
                        <h5>John McIntyre</h5>
                        <p>CEO, TransTech</p>
                      </div>
                      <div class="avatar"><img alt="" src="img/person-1.jpg" class="img-fluid"></div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="item">
                <div class="testimonial d-flex flex-wrap">
                  <div class="text">
                    <p>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought. It wasn't a dream.</p>
                  </div>
                  <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                    <div class="icon"><i class="fa fa-quote-left"></i></div>
                    <div class="testimonial-info d-flex">
                      <div class="title">
                        <h5>John McIntyre</h5>
                        <p>CEO, TransTech</p>
                      </div>
                      <div class="avatar"><img alt="" src="img/person-2.jpg" class="img-fluid"></div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="item">
                <div class="testimonial d-flex flex-wrap">
                  <div class="text">
                    <p>His room, a proper human room although a little too small, lay peacefully between its four familiar walls.</p>
                    <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                  </div>
                  <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                    <div class="icon"><i class="fa fa-quote-left"></i></div>
                    <div class="testimonial-info d-flex">
                      <div class="title">
                        <h5>John McIntyre</h5>
                        <p>CEO, TransTech</p>
                      </div>
                      <div class="avatar"><img alt="" src="img/person-3.png" class="img-fluid"></div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="item">
                <div class="testimonial d-flex flex-wrap">
                  <div class="text">
                    <p>It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad.</p>
                  </div>
                  <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                    <div class="icon"><i class="fa fa-quote-left"></i></div>
                    <div class="testimonial-info d-flex">
                      <div class="title">
                        <h5>John McIntyre</h5>
                        <p>CEO, TransTech</p>
                      </div>
                      <div class="avatar"><img alt="" src="img/person-4.jpg" class="img-fluid"></div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="item">
                <div class="testimonial d-flex flex-wrap">
                  <div class="text">
                    <p>It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad.</p>
                  </div>
                  <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                    <div class="icon"><i class="fa fa-quote-left"></i></div>
                    <div class="testimonial-info d-flex">
                      <div class="title">
                        <h5>John McIntyre</h5>
                        <p>CEO, TransTech</p>
                      </div>
                      <div class="avatar"><img alt="" src="img/person-1.jpg" class="img-fluid"></div>
                    </div>
                  </div>
                </div>
              </li>
            </ul> -->
    <!-- Carousel End-->
  </div>

</section>
<!-- <section style="background: url(img/fixed-background-2.jpg) center top no-repeat; background-size: cover;" class="bar no-mb color-white text-center bg-fixed relative-positioned">
          <div class="dark-mask"></div>
          <div class="container">
            <div class="icon icon-outlined icon-lg"><i class="fa fa-file-code-o"></i></div>
            <h3 class="text-uppercase">Do you want to see more?</h3>
            <p class="lead">We have prepared for you more than 40 different HTML pages, including 5 variations of homepage.</p>
            <p class="text-center"><a href="index2.html" class="btn btn-template-outlined-white btn-lg">See another homepage</a></p>
          </div>
        </section> -->
<section class="bg-white bar">
  <div class="container">
    <div class="heading text-center">
      <h2>Products</h2>
    </div>
    <!-- <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. <a href="blog.html">Check our blog</a></p> -->
    <div class="row">
      <div class="col-lg-3">
        <div class="home-blog-post">
          <div class="image"><img src="{{ URL::to('/') }}/public/image/tv & audio/TVs/n5500_si_hisense_television_01_l-1.jpg" alt="..." class="img-fluid">
            <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
          </div>
          <div class="text">
            <h4><a href="#">TV & Audio </a></h4>
            <!-- <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p> -->
            <p class="intro"></p><a href="{{ URL::to('/branch-result/2') }}" class="btn btn-template-outlined">Show all</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="home-blog-post">
          <div class="image"><img src="{{ URL::to('/') }}/public/image/technology/Computing/ASUS-Chromebook-Flip-C213-1.jpg" alt="..." class="img-fluid">
            <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
          </div>
          <div class="text">
            <h4><a href="#">Technology</a></h4>
            <!-- <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p> -->
            <p class="intro"></p></p><a href="{{ URL::to('/branch-result/3') }}" class="btn btn-template-outlined">Show all</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="home-blog-post">
          <div class="image"><img src="{{ URL::to('/') }}/public/image/Furniture/Dining Room/Carina-Dining-Set.jpg" height="172px" alt="..." class="img-fluid">
            <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
          </div>
          <div class="text">
            <h4><a href="#">Furniture</a></h4>
            <!-- <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p> -->
            <p class="intro"></p><a href="{{ URL::to('/branch-result/4') }}" class="btn btn-template-outlined">Show all</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="home-blog-post">
          <div class="image"><img src="{{ URL::to('/') }}/public/image/Applications/Cookers & Microwaves/Daewoo-KOC9Q4T-e1518714988146.jpg" height="172px" alt="..." class="img-fluid">
            <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
          </div>
          <div class="text">
            <h4><a href="#">Application</a></h4>
            <!-- <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p> -->
            <p class="intro"></p><a href="{{ URL::to('/branch-result/1') }}" class="btn btn-template-outlined">Show all</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="get-it">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 text-center p-3">
        <h3>Do you want a fully furnished home?</h3>
      </div>
      <div class="col-lg-4 text-center p-3"> <a href="#" class="btn btn-template-outlined-white">Please come with us</a></div>
    </div>
  </div>
</div>
@endsection