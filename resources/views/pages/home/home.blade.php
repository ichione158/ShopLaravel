@extends('pages.index')

@section('content')
  @include('pages.home.slide')
  <!-- section -->
  <div class="section padding_layout_1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="main_heading text_align_center">
              <h2>Why Choose Us</h2>
              <p class="large">Fastest repair service with best price!</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="full text_align_center margin_bottom_30">
            <div class="center">
              <div class="icon"> <img src="{{URL::asset('front-end/images/it_service/i1.png')}}" alt="#" /> </div>
            </div>
            <h4 class="theme_color">Data recovery</h4>
            <p>Perspiciatis eos quos totam cum minima aut!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="full text_align_center margin_bottom_30">
            <div class="center">
              <div class="icon"> <img src="{{URL::asset('front-end/images/it_service/i2.png')}}" alt="#" /> </div>
            </div>
            <h4 class="theme_color">Computer repair</h4>
            <p>Perspiciatis eos quos totam cum minima aut!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="full text_align_center margin_bottom_30">
            <div class="center">
              <div class="icon"> <img src="{{URL::asset('front-end/images/it_service/i3.png')}}" alt="#" /> </div>
            </div>
            <h4 class="theme_color">Mobile service</h4>
            <p>Perspiciatis eos quos totam cum minima aut!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="full text_align_center margin_bottom_30 margin_0">
            <div class="center">
              <div class="icon"> <img src="{{URL::asset('front-end/images/it_service/i4.png')}}" alt="#" /> </div>
            </div>
            <h4 class="theme_color">Network solutions</h4>
            <p>Perspiciatis eos quos totam cum minima aut!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1 light_silver gross_layout">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="main_heading text_align_left">
              <h2>Service Process</h2>
              <p class="large">Easy and effective way to get your device repaired.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-4">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="{{URL::asset('front-end/images/it_service/si1.png')}}" alt="#" /></div>
                  <h4 class="service-heading">Fast service</h4>
                  <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="{{URL::asset('front-end/images/it_service/si2.png')}}" alt="#" /></div>
                  <h4 class="service-heading">Secure payments</h4>
                  <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="{{URL::asset('front-end/images/it_service/si3.png')}}" alt="#" /></div>
                  <h4 class="service-heading">Expert team</h4>
                  <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="{{URL::asset('front-end/images/it_service/si4.png')}}" alt="#" /></div>
                  <h4 class="service-heading">Affordable services</h4>
                  <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="{{URL::asset('front-end/images/it_service/si5.png')}}" alt="#" /></div>
                  <h4 class="service-heading">90 Days warranty</h4>
                  <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="{{URL::asset('front-end/images/it_service/si6.png')}}" alt="#" /></div>
                  <h4 class="service-heading">Award winning</h4>
                  <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end section -->
  <!-- section -->
  <div class="section padding_layout_1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="main_heading text_align_center">
              <h2>Our Products</h2>
              <p class="large">We package the products with best services to make you a happy customer.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        @if(!empty($products))
          @foreach($products as $key => $row)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
              <div class="product_list">
                <div class="product_img"> <img class="img-responsive" src="{{URL::asset($row->path.$row->image)}}" alt=""> </div>
                <div class="product_detail_btm">
                  <div class="center">
                    <h4><a href="{{ $row->id }}">{{ $row['name'] }}</a></h4>
                  </div>
                  <div class="starratin">
                    <div class="center"> 
                      <i class="fa fa-star" aria-hidden="true"></i> 
                      <i class="fa fa-star" aria-hidden="true"></i> 
                      <i class="fa fa-star" aria-hidden="true"></i> 
                      <i class="fa fa-star" aria-hidden="true"></i> 
                      <i class="fa fa-star" aria-hidden="true"></i> 
                    </div>
                  </div>
                  <div class="product_price">
                    {{-- <p><span class="old_price">$15.00</span> – <span class="new_price">$25.00</span></p> --}}
                    <p><span class="new_price">{{ number_format($row->price) }} VNĐ</span></p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1 light_silver gross_layout right_gross_layout">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="main_heading text_align_right">
              <h2>Our Feedback</h2>
              <p class="large">Easy and effective way to get your device repaired.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row counter">
        <div class="col-md-4"> </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_50">
              <div class="text_align_right"><i class="fa fa-smile-o"></i></div>
              <div class="text_align_right">
                <p class="counter-heading text_align_right">Happy Customers</p>
              </div>
              <h5 class="counter-count">2150</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_50">
              <div class="text_align_right"><i class="fa fa-laptop"></i></div>
              <div class="text_align_right">
                <p class="counter-heading text_align_right">Laptop Repaired</p>
              </div>
              <h5 class="counter-count">1280</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_50">
              <div class="text_align_right"><i class="fa fa-desktop"></i></div>
              <div class="text_align_right">
                <p class="counter-heading">Computer Repaired</p>
              </div>
              <h5 class="counter-count">848</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_50">
              <div class="text_align_right"><i class="fa fa-windows"></i></div>
              <div class="text_align_right">
                <p class="counter-heading">OS Installed</p>
              </div>
              <h5 class="counter-count">450</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="main_heading text_align_left">
              <h2>Latest from Our Blog</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="full blog_colum">
            <div class="blog_feature_img"> <img src="{{URL::asset('front-end/images/it_service/post-03.jpg')}}" alt="#" /> </div>
            <div class="post_time">
              <p><i class="fa fa-clock-o"></i> April 16, 2018 ( In Maintenance )</p>
            </div>
            <div class="blog_feature_head">
              <h4>Why Your Computer Hates You</h4>
            </div>
            <div class="blog_feature_cont">
              <p>Lorem ipsum dolor sit amet, consectetur quam justo, pretium adipiscing elit. Vestibulum quam justo, pretium eu tempus ut, ...</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="full blog_colum">
            <div class="blog_feature_img"> <img src="{{URL::asset('front-end/images/it_service/post-04.jpg')}}" alt="#" /> </div>
            <div class="post_time">
              <p><i class="fa fa-clock-o"></i> April 16, 2018 ( In Maintenance )</p>
            </div>
            <div class="blog_feature_head">
              <h4>Easy Tips To Computer Repair</h4>
            </div>
            <div class="blog_feature_cont">
              <p>Lorem ipsum dolor sit amet, consectetur quam justo, pretium adipiscing elit. Vestibulum quam justo, pretium eu tempus ut, ...</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="full blog_colum">
            <div class="blog_feature_img"> <img src="{{URL::asset('front-end/images/it_service/post-06.jpg')}}" alt="#" /> </div>
            <div class="post_time">
              <p><i class="fa fa-clock-o"></i> April 16, 2018 ( In Maintenance )</p>
            </div>
            <div class="blog_feature_head">
              <h4>Computer Maintenance 2018</h4>
            </div>
            <div class="blog_feature_cont">
              <p>Lorem ipsum dolor sit amet, consectetur quam justo, pretium adipiscing elit. Vestibulum quam justo, pretium eu tempus ut, ...</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1 testmonial_section white_fonts">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="main_heading text_align_left">
              <h2 style="text-transform: none;">What Clients Say?</h2>
              <p class="large">Here are testimonials from clients..</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-7">
          <div class="full">
            <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ul class="carousel-indicators">
                <li data-target="#testimonial_slider" data-slide-to="0" class="active"></li>
                <li data-target="#testimonial_slider" data-slide-to="1"></li>
                <li data-target="#testimonial_slider" data-slide-to="2"></li>
              </ul>
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="testimonial-container">
                    <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. 
                      I am really satisfied with my first laptop service. </div>
                    <div class="testimonial-photo"> <img src="{{URL::asset('front-end/images/it_service/client1.jpg')}}" class="img-responsive" alt="#" width="150" height="150"> </div>
                    <div class="testimonial-meta">
                      <h4>Maria Anderson</h4>
                      <span class="testimonial-position">CFO, Tech NY</span> </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="testimonial-container">
                    <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. 
                      I am really satisfied with my first laptop service. </div>
                    <div class="testimonial-photo"> <img src="{{URL::asset('front-end/images/it_service/client2.jpg')}}" class="img-responsive" alt="#" width="150" height="150"> </div>
                    <div class="testimonial-meta">
                      <h4>Maria Anderson</h4>
                      <span class="testimonial-position">CFO, Tech NY</span> </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="testimonial-container">
                    <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. 
                      I am really satisfied with my first laptop service. </div>
                    <div class="testimonial-photo"> <img src="{{URL::asset('front-end/images/it_service/client3.jpg')}}" class="img-responsive" alt="#" width="150" height="150"> </div>
                    <div class="testimonial-meta">
                      <h4>Maria Anderson</h4>
                      <span class="testimonial-position">CFO, Tech NY</span> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="full"> </div>
        </div>
      </div>
    </div>
</div>
  <!-- end section -->
  <!-- section -->
<div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="contact_us_section">
              <div class="call_icon"> <img src="{{URL::asset('front-end/images/it_service/phone_icon.png')}}" alt="#" /> </div>
              <div class="inner_cont">
                <h2>REQUEST A FREE QUOTE</h2>
                <p>Get answers and advice from people you want it from.</p>
              </div>
              <div class="button_Section_cont"> <a class="btn dark_gray_bt" href="it_contact.html">Contact us</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1" style="padding: 50px 0;">
   
</div>
<!-- end section -->
@endsection