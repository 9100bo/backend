<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table='products';

    protected $fillable = [
        'name', 'info', 'img_url',
    ];
    public function product_type()
    {
        return $this->belongsTo('App\ProductsType','type_id');
    }
}
