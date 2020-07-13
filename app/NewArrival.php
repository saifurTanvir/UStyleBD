<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewArrival extends Model
{
    protected $guarded = [];

    public function productDetail(){
        return $this->morphOne(ProductDetail::class, 'productDetailable');
    }
}
