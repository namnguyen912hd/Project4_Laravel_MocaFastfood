<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\permission;

class PermissionController extends Controller
{
    public function createPermission()
    {
        return view('admin.permission.add');
    }   

    public function storePermission(Request $request)
    {
    	$permission = Permission::create([
    		'name' => 'Quản lí' . ' ' . $request->module_parent,
    		'display_name' => 'Quản lí' . ' ' . $request->module_parent,
    		'parentID' => 0,
    		'key_code' => ''
    	]);
    	foreach ($request->module_children as $value) {
    		Permission::create([
    			'name' => $value . ' ' . $request->module_parent,
	    		'display_name' => $value . ' ' . $request->module_parent,
	    		'parentID' => $permission->id,
	    		'key_code' => $value . '_' . $request->module_parent
    		]);
    	}

    	return view('admin.permission.add');
    }
}
