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
                <h2>Cảm ơn bạn đã đặt hàng tại Sketchy</h2>
                <hr>
                <p>Mã đơn hàng của bạn là: <b>{{ $order->code_order }}</b>. Đơn hàng sẽ được vận chuyển trong thời gian sớm nhất</p>
            </div>
        </div>
    </div>
</div>
<!-- section -->
@endsection