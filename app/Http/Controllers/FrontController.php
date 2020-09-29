<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
        $news_list = DB::table('news')->orderBy('id', 'desc')->take(3)->get();
        return view('front/index',compact('news_list'));
    }
    public function news(){
        return view('front/news');
    }
    public function news_info(){
        return view('front/news_info');
    }
    public function contact_us(){
        return view('front/contact_us');
    }
}
