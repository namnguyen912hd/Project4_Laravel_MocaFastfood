<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;

use App\models\product;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{

	private $product;


	public function __construct(Product $product){

		$this->product = $product;

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
}
