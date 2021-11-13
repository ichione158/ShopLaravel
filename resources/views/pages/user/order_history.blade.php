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
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    @if(!$orders->isEmpty())
                    <div class="product-table">
                      <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Number</th>
                                <th class="text-center">Order date</th>
                                <th class="text-center">Order code</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Product</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $key => $row)
                                <?php 
                                    $status = '';
                                    if($row->status == 1){
                                        $status = 'Waiting';
                                    }else if($row->status == 2){
                                        $status = 'Shipping';
                                    }else if($row->status == 3){
                                        $status = 'Success';
                                    }
                                ?>
                                <tr class='clickable-row' data-href='order_detail/{{ $row->code_order }}' >
                                    <td class="col-sm-1 col-md-1 text-center">{{ $key + 1 }}</td>
                                    <td class="col-sm-2 col-md-1 text-center">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                    <td class="col-sm-1 col-md-1 text-center">{{ $row->code_order }}</td>
                                    <td class="col-sm-2 col-md-3 text-center">{{ $row->address }}</td>
                                    <td class="table_product order_product_{{ $key + 1 }}">

                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center" style="color: red">
                                        {{ number_format($row->total) }} VNĐ
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center">
                                        {{ $status }}
                                    </td>
                                </tr>
                            @endforeach;
                        </tbody>
                      </table>                      
                    </div>  
                    @else   
                        <p style="text-align: center; font-size: 2.5rem;">You have no purchase history</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{URL::asset('front-end/js/jquery.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });


    @if(!$orders->isEmpty())
        @foreach($orders as $key => $row)
            load_order( {{ $row->id }}, {{ $key + 1 }} )
        @endforeach;
    @endif

    function load_order(id_order, number){
        $.ajax({
            type: "POST",
            url : '{{ route("user.order_product") }}',
            data:{
                id_order : id_order,
            }
        }).done(function(resp){
            $('.order_product_'+number).html(resp);
        });
    }
</script>
<!-- section -->
@endsection