@extends('layouts/app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<form method='POST' action='/admin/products/store' enctype='multipart/form-data'>
    @csrf
    <div class="form-group">
        <label for="type_id">类别</label>
        <select name="type_id" id="" class='form-control'>
            @foreach ($product_types as $product_type)
            <option value="{{$product_type->id}}">{{$product_type->type_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name='name'>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name='price'>

    </div>
    <div class="form-group">
        <label for="product_image">Image</label>
        <input type="file" class="form-control-file" id="product_image" name='product_image'>
    </div>
    <div class="form-group">
        <label for="imgs">Image</label>
        <input type="file" class="form-control-file" id="imgs" name='imgs[]' multiple required>
    </div>
    <div class="form-group">
        <label for="info">Info</label>
        {{-- <input type="text" class="form-control" id="info" name='info'> --}}
        <textarea id="info" name="info" class='form-control'></textarea>
    </div>
    <button type="submit" class="btn btn-primary">提交</button>
</form>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#info').summernote({
            height: 150,
            lang: 'zh-TW',
            callbacks: {
                onImageUpload: function(files) {
                    for(let i=0; i < files.length; i++) {
                        $.upload(files[i]);
                    }
                },
                onMediaDelete : function(target) {
                    $.delete(target[0].getAttribute("src"));
                }
            },
        });

        $.upload = function (file) {
            let out = new FormData();
            out.append('file', file, file.name);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/admin/ajax_upload_img',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function (img) {
                    $('#info').summernote('insertImage', img);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        }


        $.delete = function (file_link) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/admin/ajax_delete_img',
                data: {file_link:file_link},
                success: function (img) {
                    console.log("delete:",img);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        }
    });
</script>
@endsection
