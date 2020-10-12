@extends('layouts/app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
        <li class="breadcrumb-item"><a href="/admin/products">最新商品管理</a></li>
        <li class="breadcrumb-item"><a href="/admin/products/create">新增商品</a></li>
        <li class="breadcrumb-item active" ></li>
        </ol>
    </nav>

    <button type="button" class="btn btn-outline-success"><a href="/admin/products/create">新增商品</a></button>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        @csrf
        <thead>
            <tr>
                <th>名稱</th>
                <th>圖片</th>
                <th>價錢</th>
                <th>介紹內容</th>
                <th>上架日期</th>
                <th width="200px">Change</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pro_list as $products)
                <tr>
                    <td>{{$products->name}}</td>
                    <td>
                        <img width='200px' src="{{$products->product_image}}" alt="">
                    </td>
                    <td>{{$products->price}}</td>
                    <td>{{$products->info}}</td>
                    <td>{{$products->created_at}}</td>
                    <td>
                        <button type="button" class="btn btn-success"><a href="/admin/products/edit/{{$products->id}}">編輯</a></button>
                        <button type="button" class="btn btn-danger delete" data-productsid="{{$products->id}}">刪除</button>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $("#example").on("click", ".delete", function(){
                var news_id=this.dataset.productsid;
                var r = confirm("Press a button!");
                    if (r == true) {
                    window.location.href=`/admin/products/destroy/${news_id}`;
                }
            });
        });

    </script>
@endsection
