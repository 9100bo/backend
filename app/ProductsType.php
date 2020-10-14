<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsType extends Model
{
    //
    protected $table='products_type';

    protected $fillable = [
        'type_name', 'sort'
    ];
    public function products()
    {
        return $this->hasMany('App\Products','type_id');
    }
}
