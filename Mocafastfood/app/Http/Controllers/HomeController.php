<?php

namespace App\Http\Controllers;

use App\models\category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\models\user;


class HomeController extends Controller
{
	private $category;
	private $product;
	private $tag;
	private $user;


	public function __construct(Category $category, User $user){

		$this->category = $category;

		$this->user = $user;

	} 

	public function index(){
		$categories = $this->category->all();

		return view('home.index', compact('categories'));
	}

	public function about(){
		$categories = $this->category->all();

		return view('home.about');
	}

	
	// log in
	public function LogIn(Request $request)
	{

		return view('home.log_in');

	}

	public function postLogIn(Request $request)
	{
		//$remember = $request->has('remember_me')?true:false;
		if (Auth::attempt([
			'name'=>$request->your_name,
			'password' => $request->your_pass
		] ))  //,$remember
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
		return redirect() -> route('Mocafastfood.LogIn');
	}

	
	
	

	


}
