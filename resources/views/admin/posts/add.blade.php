@extends('admin.index')

@section('content_admin')

<style>
    .post{
        margin: 0 0 1.5rem 0;
    }
</style>

<!-- section -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <button id="back" class="btn btn-success mt-4">Back</button>
            <h1 class="mt-4">Add New Post</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Post</li>
            </ol>
            <div class="row">
                <form id="form-post">
                    
                    <div class="col-lg-9 post">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Title</span>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Input name" required>
                        </div>
                        <span class="alert error-name"></span>
                    </div>

                    <div class="col-lg-9 post">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Slug</span>
                            <input id="slug" type="text" name="slug" class="form-control" placeholder="Input slug" required>
                        </div>
                    </div>

                    <div class="col-lg-9 post">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Category</span>
                            <div class="row" style="width: 100%;">
                                @if(!empty($categories))
                                    @foreach($categories as $key => $row)
                                        <div class="col-lg-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="checkbox_{{ $key + 1}}" value="{{ $row->id }}">
                                                <label class="form-check-label" for="checkbox_{{ $key + 1}}">{{ $row->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <span class="alert error-brand"></span>
                    </div>

                    <div class="col-xl-9 col-lg-9 post">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Description</span>
                            <textarea name="description" cols="30" rows="5" class="form-control" placeholder="Input description"></textarea>
                        </div>
                        <span class="alert error-price"></span>
                    </div>

                    <div class="col-xl-4 col-lg-6 post">
                        <div class="input-group mb-3">
                            <input name="img" type="file" class="form-control" id="post_image">
                            <label class="input-group-text" for="post_image">Upload img</label>
                        </div>
                        <span class="alert error-img"></span>
                    </div>

                    <div class="col-lg-9 post">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Content</span>
                            <textarea name="content" cols="30" rows="5" class="form-control" placeholder="Input content"></textarea>
                        </div>
                    </div>

                    <button id="add_post" type="button" class="btn btn-success">Create Post</button>
                </form>
            </div>
        </div>
    </main>
    {{-- Footer!!! --}}
    @include('admin.elements.footer')
</div>
<!-- end section -->
<script>
    let input_check = [];

    $('.form-check-input').change(function(){
        let id = $(this).val();
        // Check in array
        if(input_check.includes(id)){
            // Delete 
            while(input_check.indexOf(id) !== -1){
                input_check.splice(input_check.indexOf(id), 1);
            }
        }else{
            // add in array
            input_check.push(id);
        }
        console.log(input_check);
    });

    // $('#add_product').click(function(){
    //     let data_post   = $('#form-product')[0];
    //     let formData    = new FormData(data_post);
    //     let name = $('#name').val();
    //     let price = $('#price').val();
    //     let brand_id = $('#brand_id').val();

    //     if(brand_id == '' || brand_id == null){
    //         $('.error-brand').show();
    //         $('.error-brand').html('Product brand not null!');
    //         return;
    //     }

    //     if(name == '' || name == null){
    //         $('.error-name').show();
    //         $('.error-name').html('Product name not null!');
    //         return;
    //     }

    //     if(price == '' || price == null){
    //         $('.error-price').show();
    //         $('.error-price').html('Product price not null!');
    //         return;
    //     }

    //     $.ajax({
    //         enctype: 'multipart/form-data',
    //         type: 'POST',
    //         url: '{{ route("product.add") }}',
    //         data: formData,
    //         contentType: false, 
    //         processData: false
    //     }).done(function(resp){
    //         if(resp.trim() == 'success'){
    //             alert('Cập nhật thành công');
    //             $('#form-product input').val('');
    //             $('#form-product textarea').val('');
    //             $('.alert').hide();
    //         }else{
    //             $('.error-img').show();
    //             $('.error-img').html('File must be jpg, png, git!');
    //         }
    //     });
    // });

    $('#back').click(function(){
        window.history.back();
    })
</script>

@endsection
