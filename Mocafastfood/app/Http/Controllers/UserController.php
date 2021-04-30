<?php

namespace App\Http\Controllers;
 
use App\models\user;
use App\models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Traits\DeleteModelTrait;

class UserController extends Controller
{
    use DeleteModelTrait;
	private $user;
	private $role;
    public function __construct(User $user, Role $role)
    {
    	$this->user = $user;
    	$this->role = $role;
    }

    public function index(){
        $users = $this->user->latest('id')->paginate(5);
    	return view('admin.user.index', compact('users'));
    }

    public function createUser(){

       	$roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function storeUser(Request $request){
    	try {
    		DB::beginTransaction();
    		$user = $this->user->create([
	            'name'=> $request->name,
	            'password' =>Hash::make($request->password),
	            'telnumber' =>$request->telnumber,
	            'email'=> $request->email
	        ]);
	        $user->roles()->attach($request->role_id);
	        DB::commit();
	        return redirect() -> route('users.index');

    	} catch (Exception $e) {
    		DB::rollBack();
    		Log::error('Message: ' . $e->getMessage() . '--------Line: ' . $e->getLine());
    	} 	
    }

    public function editUser($id)
    {
        $user = $this->user->find($id);
        $roles = $this->role->all();
        $rolesOfUser = $user->roles;
        return view('admin.user.edit', compact('user','roles','rolesOfUser'));
    }

    public function updateUser($id, Request $request)
    {
        try {
    		DB::beginTransaction();
    		$this->user->find($id)->update([
	            'name'=> $request->name,
	            'password' =>Hash::make($request->password),
	            'telnumber' =>$request->telnumber,
	            'email'=> $request->email
	        ]);
	        $user = $this->user->find($id);
	        $user->roles()->sync($request->role_id);
	        DB::commit();
	        return redirect() -> route('users.index');

    	} catch (Exception $e) {
    		DB::rollBack();
    		Log::error('Message: ' . $e->getMessage() . '--------Line: ' . $e->getLine());
    	} 	
    }

	public function deleteUser($id)
	    {
	        return $this->DeleteModelTrait($id,$this->user);
	    }

}
