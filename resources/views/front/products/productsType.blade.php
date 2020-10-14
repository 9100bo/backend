@extends('layouts/template')
@section('content')
<main role="main" style='margin:100px'>
    <section class="news_info">
        <div class="container">
            <h2 class="info_title">{{$product_type->type_name}}</h2>
            {{-- <div class="row news_lists">
                @foreach ($products as $product)
                    <div class="mb-3">
                        <h1>{{$product->name}}</h1>
                        <div class="row">
                            @foreach ($product as $product2)
                                <div class="col-md-4">
                                    <h3>{{$product2->name}}</h3>
                                    <img width="100%" src="{{$product2->product_image}}" alt="圖片建議尺寸: 1000 x 567">
                                    <p class="news_content">{{$product2->info}}</p>
                                    <a class="btn btn-info" href="products/{{$product2->id}}" role="button">點擊查看更多 &raquo;</a>
                                </div>

                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div> --}}
            @foreach ($products as $product)
                 <div class="col-md-4">
                        <h3>{{$product->name}}</h3>
                         <img width="100%" src="{{$product->product_image}}" alt="圖片建議尺寸: 1000 x 567">
                         <p class="news_content">{{$product->info}}</p>
                </div>

            @endforeach

        </div>
    </section>
    <hr>
</main>
@endsection

@section('lightbox')
 <!-- lightbox -->

@endsection

@section('css')
    <link rel="stylesheet" href="./css/news_info.css">

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endsection
