@extends('layouts/app')
@section('css')
@endsection

@section('content')
<form method='POST' action='/admin/product_type/{{$product_type->id}}' enctype='multipart/form-data'>
   @csrf
   @method('PUT')
    <div class="form-group">
      <label for="type_name">商品類別名稱</label>
    <input type="text" class="form-control" id="type_name" name='type_name' value='{{$product_type->type_name}}'>
    </div>
    <div class="form-group">
      <label for="sort">排序</label>
      <input type="number" class="form-control" id="sort" name='sort' value='{{$product_type->sort}}'>

    </div>
    <button type="submit" class="btn btn-primary">提交</button>
  </form>

@endsection

@section('js')
@endsection
