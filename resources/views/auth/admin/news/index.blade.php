@extends('layouts/app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
        <li class="breadcrumb-item"><a href="/admin/news">最新消息管理</a></li>
        <li class="breadcrumb-item"><a href="/admin/news/create">新增</a></li>
        <li class="breadcrumb-item active" ></li>
        </ol>
    </nav>

    <button type="button" class="btn btn-outline-success"><a href="/admin/news/create">新增最新消息</a></button>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Time</th>
                <th width="200px">Change</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news_list as $news)
                <tr>
                    <td>{{$news->id}}</td>
                    <td>
                        <img width='200px' src="{{$news->img_url}}" alt="">
                    </td>
                    <td>{{$news->title}}</td>
                    <td>{{$news->created_at}}</td>
                    <td>
                        <button type="button" class="btn btn-success"><a href="/admin/news/edit/{{$news->id}}">編輯</a></button>
                        <button type="button" class="btn btn-danger"><a href="/admin/news/destroy/{{$news->id}}">刪除</a></button>

                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
@endsection
