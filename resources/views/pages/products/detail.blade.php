@extends('pages.index')

@section('content')

@include('pages.elements.page_banner')

<div class="section padding_layout_1 product_detail">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-xl-6 col-lg-12 col-md-12">
              <div class="product_detail_feature_img hizoom hi2">
                <div class='hizoom hi2'> <img src="{{ URL::asset($product->path.$product->image) }}"/> </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 product_detail_side detail_style1">
              <div class="product-heading">
                <h2>{{ $product->name }}</h2>
              </div>
              <div class="product-detail-side"> 
                <span><del>{{ number_format( $product->price + ($product->price * 0.1)) }}</del></span>
                <span class="new-price">{{ number_format($product->price) }} VNĐ</span>
                <span class="review">(5 customer review)</span>
              </div>

              <div class="detail-contant">
                <form class="cart" method="post" action="{{ route('cart.add', $product->id) }}">
                  @csrf
                  <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                  <div class="quantity">
                    <input step="1" min="1" max="5" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" type="number">
                  </div>
                  <button type="submit" class="btn sqaure_bt">Add to cart</button>
                </form>
              </div>

              <div class="share-post"> <a href="#" class="share-text">Share</a>
                <ul class="social_icons">
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="full">
                <div class="tab_bar_section">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#description">Description</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#reviews">Reviews (2)</a> </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div id="description" class="tab-pane active">
                      <div class="product_desc">
                        <p>{{ $product->description }}</p>
                      </div>
                    </div>
                    <div id="reviews" class="tab-pane fade">
                      <div class="product_review">
                        <h3>Reviews (2)</h3>
                        <div class="commant-text row">
                          <div class="col-lg-2 col-md-2 col-sm-4">
                            <div class="profile"> <img class="img-responsive" src="images/it_service/client1.png" alt="#"> </div>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8">
                            <h5>David</h5>
                            <p><span class="c_date">March 2, 2018</span> | <span><a rel="nofollow" class="comment-reply-link" href="#">Reply</a></span></p>
                            <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                            <p class="msg">ThisThis book is a treatise on the theory of ethics, very popular during the Renaissance. 
                              The first line of Lorem Ipsum, “Lorem ipsum dolor sit amet.. </p>
                          </div>
                        </div>
                        <div class="commant-text row">
                          <div class="col-lg-2 col-md-2 col-sm-4">
                            <div class="profile"> <img class="img-responsive" src="images/it_service/client2.png" alt="#"> </div>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8">
                            <h5>Jack</h5>
                            <p><span class="c_date">March 2, 2018</span> | <span><a rel="nofollow" class="comment-reply-link" href="#">Reply</a></span></p>
                            <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                            <p class="msg">Nunc augue purus, posuere in accumsan sodales ac, euismod at est. Nunc faccumsan ermentum consectetur metus placerat mattis. Praesent mollis justo felis, accumsan faucibus mi maximus et. Nam hendrerit mauris id scelerisque placerat. Nam vitae imperdiet turpis</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="full review_bt_section">
                              <div class="float-right"> <a class="btn sqaure_bt" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Leave a Review</a> </div>
                            </div>
                            <div class="full">
                              <div id="collapseExample" class="full collapse commant_box">
                                <form accept-charset="UTF-8" action="index.html" method="post">
                                  <input id="ratings-hidden" name="rating" type="hidden">
                                  <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." required=""></textarea>
                                  <div class="full_bt center">
                                    <button class="btn sqaure_bt" type="submit">Save</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="full">
                <div class="main_heading text_align_left" style="margin-bottom: 35px;">
                  <h3>Related products</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
              <div class="product_list">
                <div class="product_img"> <img class="img-responsive" src="images/it_service/4.jpg" alt=""> </div>
                <div class="product_detail_btm">
                  <div class="center">
                    <h4><a href="it_shop_detail.html">Norton Internet Security</a></h4>
                  </div>
                  <div class="starratin">
                    <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                  </div>
                  <div class="product_price">
                    <p><span class="old_price">$15.00</span> – <span class="new_price">$25.00</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
              <div class="product_list">
                <div class="product_img"> <img class="img-responsive" src="images/it_service/5.jpg" alt=""> </div>
                <div class="product_detail_btm">
                  <div class="center">
                    <h4><a href="it_shop_detail.html">Norton Internet Security</a></h4>
                  </div>
                  <div class="starratin">
                    <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                  </div>
                  <div class="product_price">
                    <p><span class="old_price">$15.00</span> – <span class="new_price">$25.00</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
              <div class="product_list">
                <div class="product_img"> <img class="img-responsive" src="images/it_service/6.jpg" alt=""> </div>
                <div class="product_detail_btm">
                  <div class="center">
                    <h4><a href="it_shop_detail.html">Kaspersky Internet Security</a></h4>
                  </div>
                  <div class="starratin">
                    <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                  </div>
                  <div class="product_price">
                    <p><span class="old_price">$24.99</span><span class="new_price"> $12.49</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="side_bar">
            <div class="side_bar_blog">
              <h4>OUR SERVICE</h4>
              <div class="categary">
                <ul>
                  <li><a href="it_data_recovery.html"><i class="fa fa-angle-right"></i> Data recovery</a></li>
                  <li><a href="it_computer_repair.html"><i class="fa fa-angle-right"></i> Computer repair</a></li>
                  <li><a href="it_mobile_service.html"><i class="fa fa-angle-right"></i> Mobile service</a></li>
                  <li><a href="it_network_solution.html"><i class="fa fa-angle-right"></i> Network solutions</a></li>
                  <li><a href="it_techn_support.html"><i class="fa fa-angle-right"></i> Technical support</a></li>
                </ul>
              </div>
            </div>
            <div class="side_bar_blog">
              <h4>RECENT NEWS</h4>
              <div class="categary">
                <ul>
                  <li><a href="it_data_recovery.html"><i class="fa fa-angle-right"></i> Land lights let be divided</a></li>
                  <li><a href="it_computer_repair.html"><i class="fa fa-angle-right"></i> Seasons over bearing air</a></li>
                  <li><a href="it_mobile_service.html"><i class="fa fa-angle-right"></i> Greater open after grass</a></li>
                  <li><a href="it_network_solution.html"><i class="fa fa-angle-right"></i> Gathered was divide second</a></li>
                </ul>
              </div>
            </div>
            <div class="side_bar_blog">
              <h4>TAG</h4>
              <div class="tags">
                <ul>
                  <li><a href="#">Bootstrap</a></li>
                  <li><a href="#">HTML5</a></li>
                  <li><a href="#">Wordpress</a></li>
                  <li><a href="#">Bootstrap</a></li>
                  <li><a href="#">HTML5</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- end section -->

@endsection