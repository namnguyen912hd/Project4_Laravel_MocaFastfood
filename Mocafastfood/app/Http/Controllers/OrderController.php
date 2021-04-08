<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\RecusiveMenu;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\models\order;
use App\models\orderItem;
use App\models\product;
use App\models\user;

class OrderController extends Controller
{
	private $order;
	private $product;
	private $orderItem;

	public function __construct(Order $order, OrderItem $orderItem, Product $product){

		$this->order = $order;
		$this->orderItem = $orderItem;
		$this->product = $product;
	}

	public function index(){
		$orders = $this->order->latest('id')->paginate(5);
		return view('admin.order.index', compact('orders'));
	}

	public function getOrderDetail($id){
		
		$order = $this->order->find($id);
		$orderitems = $order->orderitems;
		$total = 0;
		foreach ($orderitems as $orderitem) {
			$total += $orderitem->unitprice * $orderitem->quantity;
		}
		$total = $total + 17000;
		return view('admin.order.orderDetail', compact('order','orderitems','total'));
	}

	public function confirmOrder($id)
	{
		$order = $this->order->find($id);
		$order->status = 'Đang giao';
		$order->save();
		return redirect() -> route('orders.index');
	}



	public function deleteOrder($id)
	{
		$this->order->find($id)->delete();
		$this->orderItem->find($id)->delete();
		return redirect() -> route('orders.index');
	}

    // shipper
	public function getOrderShipping()
	{
		$orders = $this->order->where('status','Đang giao')->get();
		return view('admin.order.ship', compact('orders'));
	}

	public function boomOrder($id)
	{
		$order = $this->order->find($id);
		$order->status = 'Boom';
		$order->save();
		return redirect() -> route('orders.getOrderShipping');
	}

	public function deliveredOrder($id)
	{
		$order = $this->order->find($id);
		$order->status = 'Đã giao';
		$order->save();
		return redirect() -> route('orders.getOrderShipping');
	}

}