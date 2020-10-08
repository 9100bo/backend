<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    //
    protected $table='news';

    protected $fillable = [
        'title', 'sub_title', 'img_url','content',
    ];
}
