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
            <h1 class="mt-4">Category</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Category</li>
            </ol>
            <button id="create" class="btn btn-success mt-4" style="display: none; margin-top: 0px !important">Create new</button>

            <div class="row">
                <form id="form-category">
                    <div class="col-lg-9 category">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Brand name</span>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Input name" required>
                        </div>
                        <span class="alert error-name"></span>
                    </div>
                    <input id="add_category" type="button" class="btn btn-success" value="Create Category">
                    <input id="edit_category" type="button" class="btn btn-success" value="Edit Category" style="display: none">
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
                        <tbody id="list_categories">
                            
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

    var category_id = 0;

    $(document).ready(function(){
        listCategories();
    });

    function listCategories(){
        $.ajax({
            type: 'POST',
            url : '{{ route("category.list") }}'
        }).done(function(resp){
            $('#list_categories').html(resp);
        });
    }


    $('#add_category').click(function(){
        let name = $('#name').val();

        if(name == '' || name == null){
            $('.error-name').show();
            $('.error-name').html('Category name not null!');
            return;
        }

        $.ajax({
            type: 'POST',
            url: '{{ route("category.add") }}',
            data: {
                name : name
            }
        }).done(function(resp){
            if(typeof resp.error === 'object'){
                $('.error-name').show();
                $('.error-name').html(resp.error[0]);
            }else{
                alert('Cập nhật thành công');
                $('#form-category #name').val('');
                $('.alert').hide();
                listCategories();
            }
        });
    });

    function edit_category(id){
        $('#add_category').hide();
        $('#edit_category').show();
        $('#create').show();

        category_id = id;

        $.ajax({
            type: 'GET',
            url : '/admin/category/'+id,
        }).done(function(resp){
            $('#name').val(resp);
        })
    }

    function delete_category(id){
        if(confirm('Are you sure you want to delete this')){
            $.ajax({
                type: 'delete',
                url : '/admin/category/cate_delete/'+id,
            }).done(function(resp){
                listCategories();
            })
        }
    }

    $('#create').click(function(){
        $('#add_category').show();
        $('#edit_category').hide();
        $('#create').hide();
        $('#form-category #name').val('');
        $('.alert').hide();
    })

    $('#edit_category').click(function(){
        let name = $('#name').val();
        
        if(category_id == 0){
            return;
        }

        if(name == '' || name == null){
            $('.error-name').show();
            $('.error-name').html('Category name not null!');
            return;
        }

        let url = '{{ route("category.edit", ":id") }}';
        url = url.replace(':id', category_id);

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
                $('#form-category #name').val('');
                $('.alert').hide();
                listCategories();
            }
        });
    })
</script>

@endsection