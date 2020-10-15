<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table='products';

    protected $fillable = [
        'name', 'info', 'product_image','type_id',
    ];
    public function product_type()
    {
        return $this->belongsTo('App\ProductsType','type_id');
    }
    public function productImages()
    {
        return $this->hasMany('App\ProductsImages','product_id');
    }
}
