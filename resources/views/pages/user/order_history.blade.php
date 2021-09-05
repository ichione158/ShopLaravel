@extends('pages.index')

@section('content')

@include('pages.elements.page_banner')

<style>
    .centter{
        display: flex;
        justify-content: center;
    }

    .table_product td, .table_product th {
        border-top: none;
    }

</style>

<div class="checkout_page">
    <div class="section padding_layout_1 checkout_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="product-table">
                      <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Number</th>
                                <th class="text-center">Order code</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$orders->isEmpty())
                                @foreach($orders as $key => $row)
                                    <tr class='clickable-row' data-href='order_detail/{{ $row->code_order }}' >
                                        <td class="col-sm-1 col-md-1 text-center">{{ $key + 1 }}</td>
                                        <td class="col-sm-2 col-md-2 text-center">{{ $row->code_order }}</td>
                                        <td class="col-sm-2 col-md-2 text-center">{{ $row->address }}</td>
                                        <td class="col-sm-1 col-md-1 text-center">
                                            {{ number_format($row->total) }} VNĐ
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center">
                                            Shipping
                                        </td>
                                    </tr>
                                @endforeach;
                            @endif
                        </tbody>
                      </table>                      
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section -->
@endsection