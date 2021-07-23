@extends('admin.index')

@section('content_admin')

<style>
    .brand{
        margin: 0 0 1.5rem 0;
    }

    .alert{
        color: red;
        font-size: 0.8rem;
        font-weight: 700;
        margin: 0;
        padding: 0;
        display: none;
    }
</style>

<!-- section -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add New Brand</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Brand</li>
            </ol>
            <div class="row">
                <form id="form-brand">
                    <div class="col-lg-9 brand">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Brand name</span>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Input name" required>
                        </div>
                        <span class="alert error-name"></span>
                    </div>

                    <button id="add_brand" type="button" class="btn btn-success">Create Brand</button>
                </form>
            </div>
        </div>
    </main>
    {{-- Footer!!! --}}
    @include('admin.elements.footer')
</div>
<!-- end section -->
<script>
    $('#add_brand').click(function(){

        let data_post   = $('#form-brand')[0];
        let formData    = new FormData(data_post);
        let name = $('#name').val();

        if(name == '' || name == null){
            $('.error-name').show();
            $('.error-name').html('Brand name not null!');
            return;
        }

        $.ajax({
            enctype: 'multipart/form-data',
            type: 'POST',
            url: '/admin/brand/brand_add',
            data: formData,
            contentType: false, 
            processData: false
        }).done(function(resp){
            if(resp.trim() == 'success'){
                alert('Cập nhật thành công');
                $('#form-brand input').val('');
                $('.alert').hide();
            }
        });
    });
</script>

@endsection
