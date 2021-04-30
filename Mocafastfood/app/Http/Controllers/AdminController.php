<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\role;

class AdminController extends Controller
{
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

			// check role of user
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

		// if ($request->name == 'nam nguyen') {
		// 	return redirect()->to('adminMoca');
		// }
		
	}

}
