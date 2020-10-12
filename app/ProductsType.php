<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsType extends Model
{
    //
    protected $table='products';

    protected $fillable = [
        'name', 'info', 'product_image',
    ];
    public function product_type()
    {
        return $this->hasMany('App\Products','type_id');
    }
}