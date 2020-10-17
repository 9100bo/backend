@extends('layouts/app')
@section('css')
    <style>
        .product_imgs{
            position: relative;
        }
        .product_imgs .btn-danger{
            border-radius: 50%;
            position: absolute;
            right: 18px;
            top: 3px;
        }
    </style>

@endsection

@section('content')
<form method='POST' action='/admin/products/store' enctype='multipart/form-data'>
    @csrf
    <div class="form-group">
        <label for="type_id">类别</label>
        <select name="type_id" id="" class='form-control'>
            @foreach ($product_types as $product_type)
            <option value="{{$product_type->id}}" @if($product_type->id==$products->type_id) selected
                @endif>{{$product_type->type_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name='name' value='{{$products->name}}'>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name='price' value='{{$products->price}}'>

    </div>
    <div class="form-group">
        <label for="product_image">現有的圖片</label>
        <img width="200px" src="{{$products->product_image}}" alt="">
    </div>
    <div class="form-group">
        <label for="product_image">新增單張</label>
        <input type="file" class="form-control-file" id="product_image" name='product_image'>
    </div>
    <div class="form-group row">
        <label for="product_image">多圖</label>
        {{-- {{$products->productImages}} --}}
        @foreach ($products->productImages as $product_img)
            {{-- {{$product_image}} --}}
                {{-- <img width="200px" src="{{$product_image->img_url}}" alt=""> --}}
            <div class="col-sm-2 product_imgs" data-productimgid="{{$product_img->id}}">
                <img class="img-fluid" src="{{$product_img->img_url}}" alt="">
                <button class="btn btn-danger btn-sm" data-productimgid="{{$product_img->id}}" type="button">X</button>
                <div class="sort d-flex justify-content-around row">
                    <label for="sort" class='col-2'>Sort</label>
                    <input class="form-control col-6" type="text" name="sort">
                </div>
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="imgs">新增多圖</label>
        <input type="file" class="form-control-file" id="imgs" name='imgs[]' multiple required>
    </div>
    <div class="form-group">
        <label for="info">Info</label>
        {{-- <input type="text" class="form-control" id="info" name='info'> --}}
        <textarea id="info" name="info" class='form-control'>{!!$products->info!!}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">提交</button>
</form>
@endsection

@section('js')
<script>
    $('.product_imgs .btn-danger').click(function () {
                console.log(this)

                var product_imgs_id = $(this).data('productimgid');
                console.log(product_imgs_id)

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_delete_product_imgs',
                    data: {product_imgs_id: product_imgs_id},
                    success: function (res) {
                        $( `.product_imgs[data-productimgid='${product_imgs_id}']` ).remove();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
    });
</script>
@endsection
