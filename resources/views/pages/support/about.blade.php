@extends('pages.index')

@section('content')

@include('pages.elements.page_banner')

<!-- section -->
<div class="section padding_layout_1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="main_heading text_align_center">
              <h2>We are Leading Company</h2>
              <p class="large">Garment Brand!</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row about_blog">
        <div class="col-lg-6 col-md-6 col-sm-12 about_cont_blog">
          <div class="full text_align_left">
            <h3>What we do</h3>
            <p>
              The best product for the best experience. Customer satisfaction is our pleasure! <br>
              - Cotton 210 gsm , mịn , thoáng , không xù lông <br>
              - Thấm hút mồ hôi dành cho anh em try-hard <br>
              - Số lượng release cực ít nên mọi người nhanh tay order ngay 1 áo nhé ! 
            </p>
            <ul>
              <li><i class="fa fa-check-circle"></i>Good Price</li>
              <li><i class="fa fa-check-circle"></i>Oversized Fit</li>
              <li><i class="fa fa-check-circle"></i>Cotton 100%</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 about_feature_img padding_right_0">
          {{-- <div class="full text_align_center"> <img class="img-responsive" src="{images/it_service/post-06.jpg}" alt="#" /> </div> --}}
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
              <h2>About Service</h2>
              <p class="large">Easy and effective way to get your device repaired.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-6">
              <div class="full">
                <div class="service_blog_inner2">
                  <div class="icon text_align_left"><i class="fa fa-wrench"></i></div>
                  <h4 class="service-heading">Honest Services</h4>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa ntium dolore mque.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="full">
                <div class="service_blog_inner2">
                  <div class="icon text_align_left"><i class="fa fa-cog"></i></div>
                  <h4 class="service-heading">Secure payments</h4>
                  <p></p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="full">
                <div class="service_blog_inner2">
                  <div class="icon text_align_left"><i class="fa fa-history"></i></div>
                  <h4 class="service-heading">Expert team</h4>
                  <p></p>
                </div>
              </div>
            </div>  
            <div class="col-md-6">
              <div class="full">
                <div class="service_blog_inner2">
                  <div class="icon text_align_left"><i class="fa fa-heart-o"></i></div>
                  <h4 class="service-heading">Affordable services</h4>
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
@endsection