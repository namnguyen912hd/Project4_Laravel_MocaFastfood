<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
	protected $guarded = [];

	public function products(){
		return $this->belongsToMany(Product::class, 'order_items', 'order_id','product_id')->withTimestamps();
	}

	public function orderitems()
    {
    	return $this->hasMany(orderItem::class,'order_id');
    }
}
