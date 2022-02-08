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
              <p class="large">Outstanding products at competitive prices!</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="full text_align_center margin_bottom_30">
            <div class="center" style="height: 100px">
              <div class="icon"> <img src="{{URL::asset('front-end/images/istockphoto-943376030-612x612.jpg')}}" alt="#" /> </div>
            </div>
            <h4 class="theme_color">Lowest Price Guarantee</h4>
            <p>We will beat any price you find in any authorised retail store in Vietnamese by 10% of the difference.!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="full text_align_center margin_bottom_30">
            <div class="center" style="height: 100px">
              <div class="icon"> <img src="{{URL::asset('front-end/images/Customer-Service-skills-needed-in-2021.jpg')}}" alt="#" /> </div>
            </div>
            <h4 class="theme_color">Customer Service Goes Beyond Just Words</h4>
            <p>When you choose our company, we'll take care of the hard work for you, so as to ensure that you are able to get the most from your nuptials!!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="full text_align_center margin_bottom_30">
            <div class="center" style="height: 100px">
              <div class="icon"> <img src="{{URL::asset('front-end/images/imager_79701.jpg')}}" alt="#" /> </div>
            </div>
            <h4 class="theme_color">Amazing Introductory Offers</h4>
            <p>Many different preferential policies for special customers!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="full text_align_center margin_bottom_30 margin_0">
            <div class="center" style="height: 100px">
              <div class="icon"> <img src="{{URL::asset('front-end/images/return.jpg')}}" alt="#" /> </div>
            </div>
            <h4 class="theme_color">Return goods!</h4>
            <p>Orders can be returned to your home when damaged!</p>
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
              <p class="large"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-6">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="{{URL::asset('front-end/images/it_service/si1.png')}}" alt="#" /></div>
                  <h4 class="service-heading">Fast service</h4>
                  <p>Delivery time from 2-3 days. Deliver to home.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="{{URL::asset('front-end/images/it_service/si2.png')}}" alt="#" /></div>
                  <h4 class="service-heading">Secure payments</h4>
                  <p>COD payment. Receive goods -> Check goods -> Payment</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="{{URL::asset('front-end/images/it_service/si4.png')}}" alt="#" /></div>
                  <h4 class="service-heading">Affordable services</h4>
                  <p>Good price. The best quality.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="{{URL::asset('front-end/images/it_service/si5.png')}}" alt="#" /></div>
                  <h4 class="service-heading">7 Days warranty</h4>
                  <p></p>
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
                <div class="product_img"> <img style="width:300px; height:300px" class="img-responsive" src="{{URL::asset($row->path.$row->image)}}" alt=""> </div>
                <div class="product_detail_btm">
                  <div class="center">
                    <h4><a href="{{ route('product.detail', $row->slug) }}">{{ $row->name }}</a></h4>
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
              <p class="large"></p>
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
{{-- <div class="section padding_layout_1">
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
</div> --}}
<!-- end section -->
<!-- section -->

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
              <div class="button_Section_cont"> <a class="btn dark_gray_bt" href="{{ route('contact') }}">Contact us</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- end section -->
@endsection