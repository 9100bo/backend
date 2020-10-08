@extends('layouts/app')
@section('css')

@endsection

@section('content')
<form method='POST' action='/admin/news/update/{{$news->id}}' enctype='multipart/form-data'>
   @csrf
    <div class="form-group">
      <label for="title">標題</label>
    <input type="text" class="form-control" id="title" name='title' value='{{$news->title}}'>
    </div>
    <div class="form-group">
      <label for="sub_title">副標題</label>
      <input type="text" class="form-control" id="sub_title" name='sub_title' value='{{$news->sub_title}}'>

    </div>
    <div class="form-group">
        <label for="image">現有的圖片</label>
    <img width="100%" src="{{$news->img_url}}" alt="">
        <label for="image">新增的圖片</label>
        <input type="file" class="form-control-file" id="image" name='img_url'>
      </div>
    <div class="form-group">
      <label for="content">內容</label>
      <input type="text" class="form-control" id="content" name='content' value='{{$news->content}}'>
    </div>
    <button type="submit" class="btn btn-primary">編輯</button>
  </form>

@endsection

@section('js')

@endsection
