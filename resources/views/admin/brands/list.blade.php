@extends('admin.index')

@section('content_admin')
<style>
    .btn{
        margin: 10px 0px;
    }
</style>
<!-- section -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Brand</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Brand</li>
            </ol>
            <button id="create" class="btn btn-success mt-4" style="display: none; margin-top: 0px !important">Create new</button>

            <div class="row">
                <form id="form-brand">
                    <div class="col-lg-9 brand">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Brand name</span>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Input name" required>
                        </div>
                        <span class="alert error-name"></span>
                    </div>
                    <input id="add_brand" type="button" class="btn btn-success" value="Create Brand">
                    <input id="edit_brand" type="button" class="btn btn-success" value="Edit Brand" style="display: none">
                </form>
            </div>
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    List Brand
                </div>
                <div class="card-body">
                    <table class="table" style="text-align: center">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Name</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody id="list_brands">
                            
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

    var brand_id = 0;

    $(document).ready(function(){
        listBrands();
    });

    function listBrands(){
        $.ajax({
            type: 'POST',
            url : '{{ route("brand.list") }}'
        }).done(function(resp){
            $('#list_brands').html(resp);
        });
    }


    $('#add_brand').click(function(){
        let name = $('#name').val();

        if(name == '' || name == null){
            $('.error-name').show();
            $('.error-name').html('Brand name not null!');
            return;
        }

        $.ajax({
            type: 'POST',
            url: '{{ route("brand.add") }}',
            data: {
                name : name
            }
        }).done(function(resp){
            if(typeof resp.error === 'object'){
                $('.error-name').show();
                $('.error-name').html(resp.error[0]);
            }else{
                alert('Cập nhật thành công');
                $('#form-brand #name').val('');
                $('.alert').hide();
                listBrands();
            }
        });
    });

    function edit_brand(id){
        $('#add_brand').hide();
        $('#edit_brand').show();
        $('#create').show();

        brand_id = id;

        $.ajax({
            type: 'GET',
            url : '/admin/brand/'+id,
        }).done(function(resp){
            $('#name').val(resp);
        })
    }

    $('#create').click(function(){
        $('#add_brand').show();
        $('#edit_brand').hide();
        $('#create').hide();
        $('#form-brand #name').val('');
        $('.alert').hide();
    })

    $('#edit_brand').click(function(){
        let name = $('#name').val();
        
        if(brand_id == 0){
            return;
        }

        if(name == '' || name == null){
            $('.error-name').show();
            $('.error-name').html('Brand name not null!');
            return;
        }

        let url = '{{ route("brand.edit", ":id") }}';
        url = url.replace(':id', brand_id);

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                name : name
            }
        }).done(function(resp){
            if(typeof resp.error === 'object'){
                $('.error-name').show();
                $('.error-name').html(resp.error[0]);
            }else{
                alert('Cập nhật thành công');
                $('.alert').hide();
                listBrands();
            }
        });
    })
</script>

@endsection