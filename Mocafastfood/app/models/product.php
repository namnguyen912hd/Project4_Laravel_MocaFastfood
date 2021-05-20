<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class product extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'products';
    public function images()
    {
    	return $this->hasMany(productImage::class,'product_id');
    }
    public function tags(){
    	return $this->belongsToMany(Tag::class, 'product_tags', 'product_id','tag_id')->withTimestamps();
    }
     public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function productImages()
    {
        return $this->hasMany(productImage::class,'product_id');
    }

    public static function getProducts(){
        $result = DB::table('products')->select('id','name','price','quantitysold')->orderBy('price','asc')->get()->toArray();
        return $result;
    }

    // public function orders(){
    //     return $this->belongsToMany(Order::class, 'order_items', 'product_id','order_id')->withTimestamps();

    // }

}
