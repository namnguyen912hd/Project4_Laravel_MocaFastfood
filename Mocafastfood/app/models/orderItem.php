<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
    protected $guarded = [];
    public function product()
    {
    	return $this->hasOne(Product::class,'id','product_id');
    }

}
