<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\models\role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\models\user;


class AccountController extends Controller
{

	private $user;


	public function __construct(User $user){

		$this->user = $user;

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
