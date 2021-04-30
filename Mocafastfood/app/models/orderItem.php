<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
    protected $guarded = [];
    public function products()
    {
    	return $this->hasOne(Product::class,'id');
    }

}
