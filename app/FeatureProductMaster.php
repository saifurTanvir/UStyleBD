<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureProductMaster extends Model
{
    protected $guarded = [];
    public $primaryKey = 'id';

    public function details(){
        return $this->hasOne(ProductDetail::class);
    }
}
