<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\permission;
use App\models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Traits\DeleteModelTrait;

class RoleController extends Controller
{
    use DeleteModelTrait;
    private $permission;
    private $role;
    public function __construct(Permission $permission, Role $role)
    {
    	$this->permission = $permission;
    	$this->role = $role;
    }

    public function index(){
        $roles = $this->role->latest('id')->paginate(5);
        return view('admin.role.index', compact('roles'));
    }

    public function createRole(){
    	$permissionsParent = $this->permission->where('parentID',0)->get();
        return view('admin.role.add', compact('permissionsParent'));
    }

    public function storeRole(Request $request){
    	try {
    		DB::beginTransaction();
           $role = $this->role->create([
               'name'=> $request->name,
               'display_name' =>$request->display_name
           ]);
           $role->permissions()->attach($request->permissionID);
           DB::commit();
           return redirect() -> route('roles.index');

       } catch (Exception $e) {
          DB::rollBack();
          Log::error('Message: ' . $e->getMessage() . '--------Line: ' . $e->getLine());
      } 	
    }

    public function editRole($id)
    {
        $role = $this->role->find($id);
        $permissionsParent = $this->permission->where('parentID',0)->get();
        $permissionsChecked = $role->permissions;
        return view('admin.role.edit', compact('role','permissionsParent','permissionsChecked'));
    }

    public function updateRole($id, Request $request)
    {
        try {
          DB::beginTransaction();
          $this->role->find($id)->update([
           'name'=> $request->name,

           'display_name' =>$request->display_name
       ]);	
          $role = $this->role->find($id);
          $role->permissions()->sync($request->permissionID);
          DB::commit();
          return redirect() -> route('roles.index');

      } catch (Exception $e) {
          DB::rollBack();
          Log::error('Message: ' . $e->getMessage() . '--------Line: ' . $e->getLine());
      } 	
    }

	  public function deleteRole($id)
	  {
	    return $this->DeleteModelTrait($id,$this->role);
	  }
     
   
}
