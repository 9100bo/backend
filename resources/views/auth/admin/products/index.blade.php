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
                <th width="100px">名稱</th>
                <th width="200px">圖片</th>
                <th width="20px">價錢</th>
                <th width="100px">介紹內容</th>
                <th width="100px">上架日期</th>
                <th width="100px">排序</th>
                <th width="100px">Change</th>
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
                    <td>{{$products->sort}}</td>
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
            // $('#example').DataTable();
            $('#example').DataTable( {
                "order": [ 5, 'desc' ],
                language:{
                    "processing":   "處理中...",
                    "loadingRecords": "載入中...",
                    "lengthMenu":   "顯示 _MENU_ 項結果",
                    "zeroRecords":  "沒有符合的結果",
                    "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                    "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
                    "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                    "infoPostFix":  "",
                    "search":       "搜尋:",
                    "paginate": {
                        "first":    "第一頁",
                        "previous": "上一頁",
                        "next":     "下一頁",
                        "last":     "最後一頁"
                    },
                    "aria": {
                        "sortAscending":  ": 升冪排列",
                        "sortDescending": ": 降冪排列"
                    }
                }
            } );
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
