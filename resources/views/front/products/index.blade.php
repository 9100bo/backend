@extends('layouts/template')
@section('content')
<main role="main">
    <section class="news">
        <div class="container">
            <h2 class="news_title">商品</h2>

            <ul><h3>品項</h3>
                {{-- <li><a href="products/products_type/{{$product->id}}">A</a></li> --}}
                @foreach ($products as $product)
                    {{-- {{$product->id}} --}}
                    <li><a href="products/products_type/{{$product->id}}">{{$product->type_name}}</a></li>
                @endforeach

            {{-- <li><a href="products/products_type/{{$products->id}}">A</a></li> --}}
                {{-- <li>B</li>
                <li>C</li> --}}
            </ul>

            <div class="row news_lists">
                @foreach ($products as $product_type)
                    <div class="mb-3">
                        <h1>{{$product_type->type_name}}</h1>
                        <div class="row">
                            @foreach ($product_type->products as $product)
                                <div class="col-md-4">
                                    <h3>{{$product->name}}</h3>
                                    <img width="100%" src="{{$product->product_image}}" alt="圖片建議尺寸: 1000 x 567">
                                    <p class="news_content">{{$product->info}}</p>
                                    <a class="btn btn-info" href="products/{{$product->id}}" role="button">點擊查看更多 &raquo;</a>
                                </div>

                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
    </section>

</main>

@endsection

@section('css')
    <link rel="stylesheet" href="./css/index.css">

@endsection

