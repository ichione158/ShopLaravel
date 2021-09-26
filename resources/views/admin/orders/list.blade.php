@extends('admin.index')

@section('content_admin')

<!-- section -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Order</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Order</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    List Order 
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>User Order</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>District</th>
                                <th>Phone</th>
                                <th>Total</th>
                                <th>Product</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            @if(!empty($orders))
                                @foreach($orders as $key => $row)
                                <?php 
                                    $status = $row->status;                                    
                                ?>
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $row->user_name }}
                                        </td>
                                        <td>
                                            {{ $row->address }}
                                        </td>
                                        <td>
                                            {{ $row->city }}
                                        </td>
                                        <td>
                                            {{ $row->district }}
                                        </td>
                                        <td>
                                            {{ $row->phone }}
                                        </td>
                                        <td>
                                            {{ number_format($row->total) }} VNĐ
                                        </td>
                                        <td class="order_product_{{ $key + 1 }}" style="width: 15%">

                                        </td>
                                        <td>
                                            <select class="select_status" onchange="update_status(<?= $row->id ?>, this.value)">
                                                @foreach($list_status as $row)
                                                    <?php 
                                                        $style = '';
                                                        if($row['id'] == $status){
                                                            $style = 'selected';
                                                        }
                                                    ?>
                                                    <option value="{{ $row['id'] }}" {{ $style }} >{{ $row['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    {{-- Footer!!! --}}
    @include('admin.elements.footer')
</div>
<!-- end section -->
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
            url : '{{ route("order.order_product") }}',
            data:{
                id_order : id_order,
            }
        }).done(function(resp){
            $('.order_product_'+number).html(resp);
        });
    }   

    function update_status(id, status){
        $.ajax({
            type: "POST",
            url : '{{ route("order.update_status") }}',
            data:{
                id : id,
                status : status,
            }
        }).done(function(resp){
            alert('Cập nhật thành công!');
        });
    }

</script>

@endsection