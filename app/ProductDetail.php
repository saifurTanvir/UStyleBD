<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $guarded = [];
    //protected $primaryKey = 'id';



    public function productDetailable(){
        return $this->morphTo(__FUNCTION__, 'productDetailable_type', 'productDetailable_id');
    }

    public function addingCart(){
        return $this->hasMany(AddingCart::class);
    }


}
