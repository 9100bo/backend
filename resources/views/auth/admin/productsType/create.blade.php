@extends('layouts/app')
@section('css')
@endsection

@section('content')
<form method='POST' action='/admin/product_type' enctype='multipart/form-data'>
   @csrf
    <div class="form-group">
      <label for="type_name">商品類別名稱</label>
      <input type="text" class="form-control" id="type_name" name='type_name'>
    </div>
    <div class="form-group">
      <label for="sort">排序</label>
      <input type="number" class="form-control" id="sort" name='sort' value="1">

    </div>
    <button type="submit" class="btn btn-primary">提交</button>
  </form>

@endsection

@section('js')
@endsection
