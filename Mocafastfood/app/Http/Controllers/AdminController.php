<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\role;
use App\models\user;
use App\models\order;
use App\models\orderItem;
use DB;

class AdminController extends Controller
{


	public function index()
	{
		return view('chart');
	}

	/**
	 * Form login 
	 * @return login view
	 */
	public function login()
	{
    	// dd(bcrypt('namng'));
		return view('login');
	}

	public function postLogin(Request $request)
	{
		$remember = $request->has('remember_me')?true:false;
		

		// get info user
		if (Auth::attempt([
			'name'=>$request->name,
			'password' => $request->password
		],$remember)) 
		{
	
		  return redirect()->to('adminMoca');
					
		}
		else { 
			echo('sai tài khoản or mật khẩu');
		}

		// if ($request->name == 'nam nguyen') {
		// 	return redirect()->to('adminMoca');
		// }
		
	}

	// highcharjs
	public function drawChart(){

		// counting

		$newOrders = DB::table('orders')
                    ->where('status', 'Chờ xác nhận')
                    ->count();

		$numberofUsers = DB::table('users')->count();

		$numberofProducts = DB::table('products')->count();

		// chart
		// 
		// order
		$deliveredOrders = DB::table('orders')
			->where('status', 'Đã giao')->count();

		$boomOrders = DB::table('orders')
			->where('status', 'Boom')->count();

        // product
        
		$quantitysolds = DB::table('products')
			->orderBy('quantitysold', 'desc')
			->take(6)
            ->pluck('quantitysold');

        $bestsellingproNames = DB::table('products')
			->orderBy('quantitysold', 'desc')
			->take(6)
            ->pluck('name');

         // turnover

		$orders = DB::table('orders')
          	->rightJoin('order_items', 'orders.id', '=', 'order_items.order_id')
          	->whereYear('orders.created_at', date('Y'))  	
          	->where('orders.status','Đã giao')
          	->select('orders.created_at','order_items.quantity','order_items.unitprice')
            ->get();

        $turnoverJan =0;
        $turnoverFeb =0;
        $turnoverMar =0;
        $turnoverApr =0;
        $turnoverMay =0;
        $turnoverJun =0;
        $turnoverJul =0;
        $turnoverAug =0;
        $turnoverSep =0;
        $turnoverOct =0;
        $turnoverNov =0;
        $turnoverDec =0;
        foreach ($orders as $order) {
        	if (date("m",strtotime($order->created_at)) == "01") {
        		$turnoverJan +=  $order->quantity * (int)$order->unitprice;
        	}
        	elseif (date("m",strtotime($order->created_at)) == "02") {
        		$turnoverFeb +=  $order->quantity * (int)$order->unitprice;
        	}
        	elseif (date("m",strtotime($order->created_at)) == "03") {
        		$turnoverMar +=  $order->quantity * (int)$order->unitprice;
        	}
        	elseif (date("m",strtotime($order->created_at)) == "04") {
        		$turnoverApr +=  $order->quantity * (int)$order->unitprice;
        	}
        	elseif (date("m",strtotime($order->created_at)) == "05") {
        		$turnoverMay +=  $order->quantity * (int)$order->unitprice;
        	}
        	elseif (date("m",strtotime($order->created_at)) == "06") {
        		$turnoverJun +=  $order->quantity * (int)$order->unitprice;
        	}
        	elseif (date("m",strtotime($order->created_at)) == "07") {
        		$turnoverJul +=  $order->quantity * (int)$order->unitprice;
        	}
        	elseif (date("m",strtotime($order->created_at)) == "08") {
        		$turnoverAug +=  $order->quantity * (int)$order->unitprice;
        	}
        	elseif (date("m",strtotime($order->created_at)) == "09") {
        		$turnoverSep +=  $order->quantity * (int)$order->unitprice;
        	}
        	elseif (date("m",strtotime($order->created_at)) == "10") {
        		$turnoverOct +=  $order->quantity * (int)$order->unitprice;
        	}
        	elseif (date("m",strtotime($order->created_at)) == "11") {
        		$turnoverNov +=  $order->quantity * (int)$order->unitprice;
        	}
        	else {
        		$turnoverDec +=  $order->quantity * (int)$order->unitprice;
        	}
        }
        $turnover = array($turnoverJan, $turnoverFeb, $turnoverMar,$turnoverApr, $turnoverMay,$turnoverJun,$turnoverJul,$turnoverAug,$turnoverSep,$turnoverOct,$turnoverNov,$turnoverDec);
		
		for ($i = 0; $i < 12; $i++) {
			if ($turnover[$i] == 0) {
				unset($turnover[$i]);
			}
		}
		//dd($turnover);
        // return

        $result = [
        	'newOrders' => $newOrders,
        	'numberofUsers' => $numberofUsers,
        	'numberofProducts' => $numberofProducts,
        	'deliveredOrders' => $deliveredOrders,
        	'boomOrders' => $boomOrders,
        	'quantitysolds' => $quantitysolds,
        	'bestsellingproNames' => $bestsellingproNames,
        	'turnover' => $turnover
        ];

        


        return view('adminPage', compact('result'));
	}






}
