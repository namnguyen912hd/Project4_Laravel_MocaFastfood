<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\models\category;
use App\models\product;
use App\models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
	private $category;
	private $product;
	private $tag;


	public function __construct(Category $category, Product $product, Tag $tag){

		$this->category = $category;
		$this->product = $product;
		$this->tag = $tag;
		
	} 
    /**
	 * getting products by categoryID
	 * @param  [int] $id [categoryId]
	 * @return list products
	 */
    public function getProductsbyCate($id)
    {
    	$categories = $this->category->all();
    	$products = $this->product->where('category_id', $id)->paginate(6);
		//dd($products);
    	$cateName = $this->category->find($id)->name;
    	return view('home.products', compact('categories','products','cateName'));
    }

    public function shopping()
    {
    	$categories = $this->category->all();

    	return view('home.shopping', compact('categories'));
    }

    /**
	 * getting a product data by id
	 * @param  [int] $id [productId]
	 * @return a product data and related products
	 */
	public function getProductDetail($id)
	{
		$product = $this->product->find($id);
		$tagIDs = $product->tags->pluck('id');
		$relatedProducts = Product::whereHas('tags', function($q) use($tagIDs) {
			$q->whereIn('tag_id', $tagIDs);
		})->take(4)->get();
		return view('home.productDetail', compact('product','relatedProducts'));
	}

	// get products by tag
	
	public function getProductsbyTag($id)
	{
		$tagName = $this->tag->find($id)->name;
		$categories = $this->category->all();
		$products = Tag::findOrFail($id)->products;
		return view('home.ProductsbyTag', compact('categories','products','tagName'));
	}






}
