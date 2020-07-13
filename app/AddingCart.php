<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddingCart extends Model
{
    protected $guarded = [];

    public function details(){
        return $this->belongsTo(ProductDetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
