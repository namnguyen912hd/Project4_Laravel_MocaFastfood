<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Components\Recusive;
use Illuminate\Http\Request;
use App\models\category;
use App\models\product;
use App\models\tag;
use App\models\productTag;
use App\models\productImage;
use App\Traits\storageImageTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\addProductRequest;
use DB;

class ProductController extends Controller
{
	use storageImageTrait;
	private $category;
	private $product;
	private $productImage;
	private $productTag;
	private $Tag;
	public function __construct(category $category, product $product, productImage $productImage,
		tag $tag, productTag $productTag)
	{
		$this->category = $category;
		$this->product = $product;
		$this->productImage = $productImage;
		$this->tag = $tag;
		$this->productTag = $productTag;

	}
	public function index()
	{
		$products = $this->product->latest('id')->paginate(5);
		return view('admin.product.index', compact('products'));
	}

	public function createProduct()
	{
		$htmlOption = $this->getCategory($parentID='');
		return view('admin.product.add', compact('htmlOption'));
	}
	public function getCategory($parentID)
	{
		$data = $this->category->all();
		$recusive = new Recusive($data);
		$htmlOption = $recusive->categoryRecusive($parentID);
		return $htmlOption;
	}

	public function storeProduct(addProductRequest $request){

		try {
			DB::beginTransaction();
			$dataProductCreate = [
				'name' => $request->name,
				'price' => $request->price,
				'content' => $request->contentPro,
				'user_id' => 1,
				'category_id' => $request->categoryID,
			];

			$dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');

			if (!empty($dataUploadFeatureImage)) {
				$dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
				$dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
			}

			$product = $this->product->create($dataProductCreate);

		// insert data into ProductImage table

			if ( $request->hasFile('image_path')) {
				foreach ($request->image_path as $fileItem) {
					$dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem,'product');
					$product->images()->create([
						'image_path' => $dataProductImageDetail['file_path'],
						'image_name' => $dataProductImageDetail['file_name']
					]);
				// this->productImage->create([
				// 	'product_id' => $product->id,
				// 	'image_path' => $dataProductImageDetail['file_path'],
				// 	'image_name' => $dataProductImageDetail['file_name']
				// ]);
				}
			}


		// insert tags into product
			if (!empty($request->tags)) {
				foreach ($request->tags as $tagItem) {
					$tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
					$tagIds[] = $tagInstance->id;
			 	// this->productTag->create([
			 	// 	'product_id' => $product->id,
			 	// 	'tag_id' => $tagInstance->id
			 	// ]);
				} 
			}
			
			$product->tags()->attach($tagIds);
			DB::commit();
			return redirect() -> route('products.index');
		} catch (Exception $e) {
			DB::rollBack();
			Log::error('Message: ' . $e->getMessage() . '--------Line: ' . $e->getLine());
		}
		
	}

	public function editProduct($id)
	{
		$product = $this->product->find($id);
		$htmlOption = $this->getCategory($product->category_id);

		return view('admin.product.edit', compact('product', 'htmlOption'));
	}

	public function updateProduct(Request $request,$id)
	{

		try {
			DB::beginTransaction();

			// insert data into product table
			$dataProductUpdate = [
				'name' => $request->name,
				'price' => $request->price,
				'content' => $request->contentPro,
				'user_id' => 1,
				'category_id' => $request->categoryID,
			];

			$dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');

			if (!empty($dataUploadFeatureImage)) {
				$dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
				$dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
			}

			$this->product->find($id)->update($dataProductUpdate);
			$product = $this->product->find($id);
		// insert data into ProductImage table

			if ( $request->hasFile('image_path')) {
				$this->productImage->where('product_id',$id)->delete();
				foreach ($request->image_path as $fileItem) {
					$dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem,'product');
					$product->images()->create([
						'image_path' => $dataProductImageDetail['file_path'],
						'image_name' => $dataProductImageDetail['file_name']
					]);
				// this->productImage->create([
				// 	'product_id' => $product->id,
				// 	'image_path' => $dataProductImageDetail['file_path'],
				// 	'image_name' => $dataProductImageDetail['file_name']
				// ]);
				}
			}


		// insert tags into product
			if (!empty($request->tags)) {
				foreach ($request->tags as $tagItem) {
					$tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
					$tagIds[] = $tagInstance->id;
			 	// this->productTag->create([
			 	// 	'product_id' => $product->id,
			 	// 	'tag_id' => $tagInstance->id
			 	// ]);
				} 
			}
			
			$product->tags()->sync($tagIds);
			DB::commit();
			return redirect() -> route('products.index');


		} catch (Exception $e) {
			DB::rollBack();
			Log::error('Messeage: ' . $e->getMessage() . 'Line: ' . $e->getLine());
		}
	}

	public function deleteProduct($id){
		try {
			$this->product->find($id)->delete();
			return response()->json([
				'code'=>200,
				'message'=>'success'
			], 200);

		} catch (Exception $e) {
			Log::error('Messeage: ' . $e->getMessage() . 'Line: ' . $e->getLine());
			return response()->json([
				'code'=>500,
				'message'=>'fail'
			], 500);
		}
	}

}
