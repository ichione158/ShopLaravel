@extends('admin.index')

@section('content_admin')

<style>
    .product{
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
            <button id="back" class="btn btn-success mt-4">Back</button>
            <h1 class="mt-4">Add New Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Product</li>
            </ol>
            <div class="row">
                <form id="form-product">
                    <div class="col-lg-9 product">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Product name</span>
                            <input id="name" type="text" name="name" class="form-control" value="<?= !empty($product) ? $product->name : '' ?>" placeholder="Input name" required>
                        </div>
                        <span class="alert error-name"></span>
                    </div>

                    <div class="col-xl-4 col-lg-6 product">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Product price</span>
                            <input id="price" type="number" name="price" class="form-control" value="<?= !empty($product) ? $product->price : '' ?>" placeholder="Input price" required>
                        </div>
                        <span class="alert error-price"></span>
                    </div>

                    <div class="col-lg-9 product">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Product description</span>
                            <textarea name="description" cols="30" rows="5" class="form-control" placeholder="Input description"><?= !empty($product) ? $product->description : '' ?></textarea>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 product">
                        <div class="input-group mb-3">
                            <input name="img" type="file" class="form-control" id="product_image">
                            <label class="input-group-text" for="product_image">Upload one img</label>
                        </div>
                        <img class="form-control" src="{{ URL::asset(!empty($product) ? $product->path.$product->image : '') }}" alt="">
                        <span class="alert error-img"></span>
                    </div>

                    <div class="col-xl-4 col-lg-6 product">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Product code</span>
                            <input type="text" name="code" class="form-control" value="<?= !empty($product) ? $product->code : '' ?>" placeholder="Input code. Ex: CO_01">
                        </div>
                    </div>

                    <button id="add_product" type="button" class="btn btn-success">Create Product</button>
                </form>
            </div>
        </div>
    </main>
    {{-- Footer!!! --}}
    @include('admin.elements.footer')
</div>
<!-- end section -->
<script>
    $('#add_product').click(function(){
        let data_post   = $('#form-product')[0];
        let formData    = new FormData(data_post);
        let name = $('#name').val();
        let price = $('#price').val();

        if(name == '' || name == null){
            $('.error-name').show();
            $('.error-name').html('Product name not null!');
            return;
        }

        if(price == '' || price == null){
            $('.error-price').show();
            $('.error-price').html('Product price not null!');
            return;
        }

        $.ajax({
            enctype: 'multipart/form-data',
            type: 'POST',
            url: '{{ route("product.edit", $product->id) }}',
            data: formData,
            contentType: false, 
            processData: false
        }).done(function(resp){
            console.log(resp);
            if(resp.trim() == 'success'){
                alert('Cập nhật thành công');
                $('.alert').hide();
                location.reload();
            }else{
                $('.error-img').show();
                $('.error-img').html('Flie must be jpg, png, git!');
            }
        });
    });

    $('#back').click(function(){
        window.history.back();
    })
</script>

@endsection
