<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\contact;
use App\Products;
use App\ProductsType;

class FrontController extends Controller
{
    public function index(){
        $news_list = DB::table('news')->orderBy('id', 'desc')->take(3)->get();
        return view('front.index',compact('news_list'));
    }
    public function news(){
        $news_list = DB::table('news')->orderBy('id', 'desc')->paginate(6);
        return view('front/news',compact('news_list'));
    }
    public function news_info($news_id){
        $news = DB::table('news')->where('id','=',$news_id)->first();
        return view('front/news_info',compact('news'));
    }
    public function contact_us(){
        return view('front/contact_us');
    }
    public function contact_product(Request $request){
        // dd($request->all());
        // DB::table('contact')->insert(
        //     ['email' => $request->email,
        //     'place' => $request->place,
        //     'file' => '',
        //     'place_name' => $request->place_name,
        //     'info' => $request->place_name,]
        // );
        contact::create($request->all());
        return 'Success';
    }
    public function products(){
        $products=ProductsType::with('products')->get();
        // dd($products);
        return view('front/products/index',compact('products'));
    }

    public function productsdetail($products_id){
        // dd($products_id);
        $products=Products::find($products_id);
        // $products=Products::all();
        // dd($products);
        return view('front/products/productsdetail',compact('products'));
    }

    public function productsType($products_type_id){
        // dd($products_type_id);
        // $products=Products::find($products_type_id);

        $product_type=ProductsType::find($products_type_id);
        $products=$product_type->products;
        // dd($products);
        return view('front/products/productsType',compact('product_type','products'));
    }
}
