@extends('layouts/app')
@section('css')

@endsection

@section('content')
<form method='POST' action='/admin/products/store' enctype='multipart/form-data'>
    @csrf
    <div class="form-group">
        <label for="type_id">类别</label>
        <select name="type_id" id="" class='form-control'>
            @foreach ($product_types as $product_type)
            <option value="{{$product_type->id}}" @if($product_type->id==$products->type_id) selected @endif>{{$product_type->type_name}}</option>
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
        <label for="product_image">多圖</label>
        {{-- {{$products->productImages}} --}}
        @foreach ($products->productImages as $product_image)
            {{-- {{$product_image}} --}}
            <img width="200px" src="{{$product_image->img_url}}" alt="">
        @endforeach
    </div>
    <div class="form-group">
        <label for="product_image">新增的圖片</label>
        <input type="file" class="form-control-file" id="product_image" name='product_image'>
    </div>
    <div class="form-group">
        <label for="info">Info</label>
        {{-- <input type="text" class="form-control" id="info" name='info'> --}}
        <textarea id="info" name="info" class='form-control'>{!!$products->info!!}</textarea>
    </div>
    <button
    type="submit" class="btn btn-primary">提交</button>
</form>

@endsection

@section('js')
@endsection
