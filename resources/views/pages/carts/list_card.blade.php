@extends('pages.index')

@section('content')

@include('pages.elements.page_banner')

<div class="shopping-cart">
  <div class="section padding_layout_1 Shopping_cart_section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="product-table">
            <table class="table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Total</th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($carts))
                  <?php $sup_total = 0; ?>
                  @foreach($carts as $key => $row)
                    <?php 
                      $total_price = 0;
                      $total_price = $row->product_price * $row->quantity;
                      $sup_total += $total_price;
                    ?>
                    <tr>
                      <td class="col-sm-8 col-md-6"><div class="media"> <a class="thumbnail pull-left" href="{{ route('product.detail', $row->product_slug) }}"> <img class="media-object" src="{{ URL::asset($row->path.$row->image) }}" alt="#"></a>
                          <div class="media-body">
                            <h4 class="media-heading"><a href="{{ route('product.detail', $row->product_slug) }}">{{ $row->product_name }}y</a></h4>
                            <span>Status: </span><span class="text-success">In Stock</span> </div>
                        </div></td>
                      <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control" value="{{ $row->quantity }}" type="email">
                      </td>
                      <td class="col-sm-1 col-md-1 text-center"><p class="price_table">{{ number_format($row->product_price) }} VNĐ</p></td>
                      <td class="col-sm-1 col-md-1 text-center"><p class="price_table">{{ number_format($total_price)}} VNĐ</p></td>
                      <td class="col-sm-1 col-md-1"><button type="button" class="bt_main"><i class="fa fa-trash"></i> Remove</button></td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
            <div class="table">

            </div>
          </div>

          <style>
            .shopping-cart-cart .button{
              padding: 9px 0px;
            }
          </style>

          <div class="shopping-cart-cart">
            <?php 
              $ship = 15000;  

              if($sup_total > 1000000){
                $ship = 0;
              }
              
              $total = $sup_total + $ship;
            ?>
            <table>
              <tbody>
                <tr class="head-table">
                  <td><h5>Cart Totals</h5></td>
                  <td class="text-right"></td>
                </tr>
                <tr>
                  <td><h4>Subtotal</h4></td>
                  <td class="text-right"><h4>{{ number_format($sup_total) }} VNĐ</h4></td>
                </tr>
                <tr>
                  <td><h5>Estimated shipping</h5></td>
                  <td class="text-right"><h4>{{ number_format($ship) }} VNĐ</h4></td>
                </tr>
                <tr>
                  <td><h3>Total</h3></td>
                  <td class="text-right"><h4>{{ number_format($total) }} VNĐ</h4></td>
                </tr>
                <tr>
                  <td><button type="button" class="button continue">Continue Shopping</button></td>
                  <td><button class="button">Checkout</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- section -->
</div>
@endsection