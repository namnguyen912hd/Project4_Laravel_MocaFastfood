<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\models\user;
use App\models\order;
use App\models\orderItem;

class OrderController extends Controller
{

	private $user;
	private $order;
	private $orderItem; 

	public function __construct(User $user,Order $order, OrderItem $orderItem){

		$this->user = $user;
		$this->order = $order;
		$this->orderItem = $orderItem;
	} 


	// order
	public function addOrder(Request $request)
	{
		$user = Auth::user();
		$order = $this->order->create([
			'user_id'=> $user->id,
			'status' => "Chờ xác nhận",
			'shippingFee' =>17000,
			'receivingAddress'=> $request->receivingAddress,
			'telnumber' => $request->telnumber,
			'receiver' => $request->receiver,
			'note' => $request->note
		]); 
		$carts = session()->get('cart');
		foreach ($carts as $cart) {
			$this->orderItem->create([
				'product_id'=> $cart['productID'],
				'order_id' => $order->id,
				'quantity' => $cart['quantity'],
				'unitprice'=> $cart['price'],
			]); 
		}

		session()->forget('cart');

		return redirect() -> route('Mocafastfood.showCart');
		
	}
 
	public function getorderStatus()
	{
		$user = Auth::user();
		$orders = $this->order->whereIn('status', ['Chờ xác nhận','Đang giao'])->where('user_id',$user->id)->get();
		$confirmingOrders = $this->order->where('status', 'Chờ xác nhận')->where('user_id',$user->id)->get();
		$deleveringOrders = $this->order->where('status', 'Đang giao')->where('user_id',$user->id)->get();
		return view('home.orderStatus',compact('orders','confirmingOrders','deleveringOrders'));
	}

	public function getorderHistory()
	{
		$user = Auth::user();
		//$oders = $this->user->find($user->id);
		$orders = $this->order->where('status', 'Đã giao')->where('user_id',$user->id)->get();
		
		return view('home.orderHistory',compact('orders'));
	}

	public function getOrderDetail($id){
		
		$order = $this->order->find($id);
		$orderitems = $order->orderitems;
		$total = 0;
		foreach ($orderitems as $orderitem) {
			$total += $orderitem->unitprice * $orderitem->quantity;
		}
		$total = $total + 17000;
		return view('home.orderDetail', compact('order','orderitems','total'));
	}




}
