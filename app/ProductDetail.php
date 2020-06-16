<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function featureProduct(){
        return $this->belongsTo(FeatureProductMaster::class);
    }

    public function newArrival(){
        return $this->belongsTo(NewArrival::class);
    }
}
