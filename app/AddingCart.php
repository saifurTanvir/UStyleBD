<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddingCart extends Model
{
    protected $guarded = [];

    public function details(){
        return $this->belongsTo(ProductDetail::class, 'product_detail_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }
}
