<?php

namespace App\Http\Controllers;

use App\models\category;
use App\models\product;
use App\models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\models\role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\models\user;

class HomeController extends Controller
{
	private $category;
	private $product;
	private $tag;
	private $user;

	public function __construct(Category $category, Product $product, Tag $tag, User $user){

		$this->category = $category;
		$this->product = $product;
		$this->tag = $tag;
		$this->user = $user;
	}

	public function index(){
		$categories = $this->category->all();

		return view('home.index', compact('categories'));
	}


	/**
	 * getting products by categoryID
	 * @param  [int] $id [categoryId]
	 * @return list products
	 */
	public function getProductsbyCate($id)
	{
		$categories = $this->category->all();
		$products = $this->product->where('category_id', $id)->get();
		$cateName = $this->category->find($id)->name;
		return view('home.products', compact('categories','products','cateName'));
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
		})->get();
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

	// shopping cart
	
	public function addToCart($id)
	{
		// session()->flush();
		$product = $this->product->find($id);
		$cart = session()->get('cart');
		if (isset( $cart[$id] )) {
			$cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
		}
		else {
			$cart[$id] = [
				'productID' => $id,
				'name' => $product->name,
				'price' => $product->price,
				'quantity' => 1,
				'image_path' => $product->feature_image_path

			];
		}
		session()->put('cart',$cart);

		return response()->json([
			'code' => 200,
			'message' => 'success'
		], 200);
		// echo '<pre>';
		// print_r(session()->get('cart'));
	}

	public function getTotalinCart(array $carts)
	{
		$total = 0;
		
		if ( $carts != null) {
			foreach ($carts as $cart) {
				$total += $cart['price'] * $cart['quantity'];
			}
			$total = $total+17000;
		}
		else {
			$total = 0;
		}
		return $total;
	}

	public function showCart()
	{
		$carts = session()->get('cart');
		$total = $this->getTotalinCart($carts);
		
		return view('home.cart', compact('carts','total'));
	}

	public function updateCart(Request $request)
	{
		$carts = session()->get('cart');
		$carts[$request->id]['quantity'] = $request->quantity;
		session()->put('cart',$carts);
		$carts = session()->get('cart');
		$total = $this->getTotalinCart($carts);
		$cartComponent = view('home.components.cartcomponent', compact('carts','total'))->render();
		return response()->json(['cart_conponent' =>$cartComponent, 'code' => 200 ], 200);
	}
	public function deleteCart(Request $request)
	{
		$carts = session()->get('cart');
		unset($carts[$request->id]);
		session()->put('cart',$carts);
		$carts = session()->get('cart');
		$total = $this->getTotalinCart($carts);
		$cartComponent = view('home.components.cartcomponent', compact('carts','total'))->render();
		return response()->json(['cart_conponent' =>$cartComponent, 'code' => 200 ], 200);
	}

	// log in
	public function LogIn(Request $request)
	{

		return view('home.log_in');

	}

	public function postLogIn(Request $request)
	{
		$remember = $request->has('remember_me')?true:false;
		if (Auth::attempt([
			'name'=>$request->your_name,
			'password' => $request->your_pass
		],$remember)) 
		{
			// $roles =Auth::user()->roles;
			foreach (Auth::user()->roles  as $role) {
				if ($role->name == "customer") {
					return redirect()->to('MocaFastfood');
				}
				else {
					return redirect()->to('adminMoca');
				}
			}
		}
		else {
			echo('sai tài khoản or mật khẩu');
		}

	}

	// sign up
	public function SignUp(Request $request)
	{

		return view('home.sign_up');

	}

	public function postSignUp(Request $request)
	{
		try {
    		DB::beginTransaction();
    		$roleID = 7;
    		$user = $this->user->create([
	            'name'=> $request->name,
	            'password' =>Hash::make($request->password),
	            'telnumber' =>$request->telnumber,
	            'email'=> $request->email
	        ]);
	        $user->roles()->attach($roleID);
	        DB::commit();
	        return redirect() -> route('Mocafastfood.LogIn');

    	} catch (Exception $e) {
    		DB::rollBack();
    		Log::error('Message: ' . $e->getMessage() . '--------Line: ' . $e->getLine());
    	} 	
	}

	// log out
	public function LogOut()
	{
		session()->flush();
		$categories = $this->category->all();
		return view('home.index', compact('categories'));
	}

	// account
	
	public function showAccount()
	{

		$user = Auth::user();
		return view('home.account',compact('user'));
	}

	public function updateAccount($id,Request $request)
	{
		try {
    		DB::beginTransaction();
    		$roleID = 7;
    		$this->user->find($id)->update([
	            'name'=> $request->name,
	            'password' =>Hash::make($request->password),
	            'telnumber' =>$request->telnumber,
	            'email'=> $request->email
	        ]);
	        $user = $this->user->find($id);
	        $user->roles()->sync($roleID);
	        DB::commit();
	        return redirect() -> route('Mocafastfood.Account');

    	} catch (Exception $e) {
    		DB::rollBack();
    		Log::error('Message: ' . $e->getMessage() . '--------Line: ' . $e->getLine());
    	} 	
	}




}
