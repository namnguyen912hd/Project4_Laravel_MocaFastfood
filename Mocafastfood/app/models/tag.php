<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
	protected $guarded = [];

	public function products(){
		return $this->belongsToMany(Product::class, 'product_tags','tag_id', 'product_id')->withTimestamps();
	}
}
