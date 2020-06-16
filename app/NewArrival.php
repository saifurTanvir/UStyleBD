<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewArrival extends Model
{
    protected $guarded = [];

    public function details(){
        return $this->hasOne(ProductDetail::class);
    }
}
