<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\ProductsType;
use App\ProductsImages;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pro_list = Products::all();
        return view('auth/admin/products/index', compact('pro_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('admin/create',compact('news_list'));
        $product_types=ProductsType::all();
        // dd($producttypes);
        return view('auth/admin/products/create', compact('product_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $files = $request->file('imgs');
        $requestData = $request->all();

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $path = $this->fileUpload($file, 'news');
            $requestData['product_image'] = $path;
        }

        // Products::create($requestData);
        // return redirect('admin/products');

        //多個檔案
        $product=Products::create($requestData);
        $product_id=$product->id;

        if($request->hasFile('imgs'))
        {
            $files = $request->file('imgs');
            foreach ($files as $file) {
                //上傳圖片
                $path = $this->fileUpload($file,'imgs');
                //新增資料進DB
                ProductsImages::create([
                    'img_url'=> $path,
                    'product_id'=> $product_id,
                ]);
            }
        }

        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product=Products::where('id',$id)->with('productImages')->first();
        // dd($product);
        $product_types=ProductsType::all();
        // $products=Products::find($id);
        $products = Products::where('id',$id)->with('productImages')->first();
        // dd($products->productImages);
        return view('auth/admin/products/edit', compact('products','product_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $item = Products::find($id);
        $requestData = $request->all();
        if ($request->hasFile('product_image')) {
            $old_image = $item->product_image;
            $file = $request->file('product_image');
            $path = $this->fileUpload($file, 'product');
            $requestData['product_image'] = $path;
            File::delete(public_path() . $old_image);
        }

        //多個檔案
        if($request->hasFile('imgs'))
        {
            $files = $request->file('imgs');
            foreach ($files as $file) {
                //上傳圖片
                $path = $this->fileUpload($file,'product_imgs');
                //新增資料進DB
                $product_img = new ProductsImages;
                $product_img->product_id = $id;
                $product_img->img_url = $path;
                $product_img->save();
            }
        }

        $item->update($requestData);

        return redirect('/admin/products');
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $news = Products::find($id);
        // $old_image = $news->img_url;
        // if (file_exists(public_path() . $old_image)) {
        //     File::delete(public_path() . $old_image);
        // }
        // $news->delete();

        // return redirect('/admin/news');
        Products::destroy($id);
        return redirect('/admin/products');
    }

    private function fileUpload($file, $dir)
    {
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $dir)) {
            mkdir('upload/' . $dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path() . '/upload/' . $dir . '/' . $filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/' . $dir . '/' . $filename;
    }
}
