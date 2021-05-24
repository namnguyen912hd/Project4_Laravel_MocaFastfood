<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Components\RecusiveMenu;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\models\order;
use App\models\orderItem;
use App\models\product;
use App\models\user;
use App\Traits\DeleteModelTrait;
use PDF;

class OrderController extends Controller
{
	use DeleteModelTrait;
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

		return $this->DeleteModelTrait($id,$this->order);
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

	// invoice
	public function generateInvoice($id){
		
		$order = $this->order->find($id);
		$orderitems = $order->orderitems;
		$total = 0;
		foreach ($orderitems as $orderitem) {
			$total += $orderitem->unitprice * $orderitem->quantity;
		}
		$total = $total + 17000;
		$data = 
         [
            'order' => $order,
            'orderitems' => $orderitems,
            'total' => $total
         ];
       $pdf = PDF::loadView('admin.order.invoice', $data);
   
       return $pdf->download('donhang.pdf');
	}


}
