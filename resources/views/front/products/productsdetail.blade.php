@extends('layouts/template')
@section('content')
<main role="main" style='margin:100px'>
    <section class="news_info">
        <div class="container">
            <h2 class="info_title">{{$products->name}}</h2>
            <div class="row">
                <div class="col-12 my-3 my-md-0 col-md-6">
                    <div class="image_box h-100">
                        {{-- <a href="{{$products->product_image}}" data-lightbox="image-1" data-title="My caption"> --}}
                            <img width="100%" src="{{$products->product_image}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-12 my-3 my-md-0 col-md-6">
                    <div class="info_content">
                        <h3>{{$products->name}}</h3>
                        價格:{{$products->price}}
                    </div>
                    <h4>介紹：{{$products->info}}</h4>

                </div>
            </div>
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
