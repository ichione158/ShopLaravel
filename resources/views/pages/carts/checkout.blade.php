@extends('pages.index')

@section('content')

@include('pages.elements.page_banner')

<style>
  .centter{
      display: flex;
      justify-content: center;
  }

</style>

<div class="checkout_page">
    <div class="section padding_layout_1 checkout_section">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="checkout-form">
                <form action="{{ route('cart.order') }}" method="post" id="form_checkout">
                  @csrf
                  <fieldset>
                  <input type="text" name="total" value="{{ $total }}" hidden>
                  <div class="row">
                    <div class="col-md-12">
                      @if ($errors->any())
                        <div class="alert alert-warning">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                      @endif
                    </div>
                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Name <span class="red">*</span></label>
                        <input name="name" type="text" value="{{ Auth::user()->name }}" required >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Country</label>
                        <select name="country_code">
                            <option value="VN">Việt Nam</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Address <span class="red">*</span></label>
                        <textarea name="address" required >{{ !empty($user) ? $user[0]->address : '' }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-field">
                          <label>District <span class="red">*</span></label>
                          <input name="district" type="text" value="{{ !empty($user) ? $user[0]->district : '' }}" required>
                        </div>
                      </div>
                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Town / City <span class="red">*</span></label>
                        <input name="city" type="text" value="{{ !empty($user) ? $user[0]->city : '' }}" required >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-field">
                        <label>Phone <span class="red">*</span></label>
                        <input name="phone" type="text" value="{{ !empty($user) ? $user[0]->phone : '' }}" required >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-field">
                        <label>Email address <span class="red">*</span></label>
                        <input name="email" type="email" value="{{ Auth::user()->email }}" required >
                      </div>
                    </div>
                  </div>
                  </fieldset>
                </form>
              </div>
            </div>
            <div class="col-md-4">
              <div class="shopping-cart-cart">
                <table>
                  <tbody>
                    <tr class="head-table">
                      <td><h5>Cart Totals</h5></td>
                      <td class="text-right"></td>
                    </tr>
                    <tr>
                      <td><h4>Subtotal</h4></td>
                      <td class="text-right"><h4>{{ number_format($sub_total) }} VNĐ</h4></td>
                    </tr>
                    <tr>
                      <td><h5>Estimated shipping</h5></td>
                      <td class="text-right"><h4>{{ number_format($ship) }} VNĐ</h4></td>
                    </tr>
                    <tr>
                      <td><h3>Total</h3></td>
                      <td class="text-right"><h4>{{ number_format($total) }} VNĐ</h4></td>
                    </tr>
                  </tbody>
                </table>
                <div class="centter">
                    <button class="bt_main order">Order</button>
                </div>
              </div>
            </div>

            {{-- <div class="col-sm-12">
              <div class="payment-form">
                <div class="col-xs-12 col-md-12">
                  <!-- CREDIT CARD FORM STARTS HERE -->
                  <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                      <div class="display-tr">
                        <h3 class="panel-title display-td">Payment Details</h3>
                        <div class="display-td"> <img class="img-responsive pull-right" src="{{URL::asset('front-end/images/it_service/accepted.png')}}" alt="#"> </div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <form id="payment-form" method="POST" action="index.html">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-field">
                              <label>Card Number</label>
                              <div class="form-field cardNumber">
                                <input name="cardNumber" placeholder="Valid Card Number" required="" type="tel">
                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span> </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-7">
                            <div class="form-field">
                              <label><span class="hidden-xs">Expiration</span><span class="visible-xs-inline">EXP</span> Date</label>
                              <input name="cardExpiry" placeholder="MM / YY" required="" type="tel">
                            </div>
                          </div>
                          <div class="col-xs-12 col-md-5 pull-right">
                            <div class="form-field">
                              <label>CV Code</label>
                              <input name="cardCVC" placeholder="CVC" required="" type="tel">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-field">
                              <label>Coupon Code</label>
                              <input name="couponCode" required="" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 payment-bt">
                            <div class="center">
                              <button class="bt_main">Start Subscription</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- CREDIT CARD FORM ENDS HERE -->
                </div>
              </div>
            </div> --}}
          </div>
        </div>
    </div>
</div>
<!-- section -->
@endsection