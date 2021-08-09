@extends('admin.index')

@section('content_admin')

<!-- section -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Product</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    List Product 
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Brand</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            @foreach($products as $key => $row)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $row->brand_id }}
                                </td>
                                <td>
                                    {{ $row->name }}
                                </td>
                                <td>
                                    <img src="{{ !empty($row->image) ? url($row->path.$row->image) : '' }}" alt="" style="width: 300px; height: 200px">
                                </td>
                                <td>
                                    {{ $row->code }}
                                </td>
                                <th>
                                    <div class="box-1">
                                        <input type='checkbox'/>
                                        <span class="toogle"></span>
                                    </div>
                                </th>
                                <td>
                                    <a href="{{ route('product.show', $row->id) }}">Edit</a> | <a href="">Delete</a>
                                </td>
                            </tr>
                            @endforeach
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
@endsection