<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\setting;
use DB;
use App\Traits\DeleteModelTrait;

class SettingController extends Controller
{

	use DeleteModelTrait;
	private $setting;

	public function __construct(Setting $setting){    
		$this->setting = $setting;
	}


	public function index(){
		$settings = $this->setting->latest('id')->paginate(5);
		return view('admin.setting.index', compact('settings'));
	}

    /**
    * creating add_menu page
    * @return void
    */
    public function create(){
    	
    	return view('admin.setting.add');
    }

    public function store(Request $request){

    	$this->setting->insert([
    		'config_key'=> $request->config_key,
    		'config_value' => $request->config_value
    	]);
        // route to menu page
    	return redirect() -> route('settings.index');
    }



    public function edit($id)
    {
    	$setting = $this->setting->find($id);
    	

    	return view('admin.setting.edit', compact('setting'));
    }


    public function update($id, Request $request)
    {

    	$setting = $this->setting->find($id);
    	$setting->config_key = $request->config_key;
    	$setting->config_value = $request->config_value;
    	$setting->save();

    	return redirect() -> route('settings.index');
    }
    /**
     * deleting 1 item
     * @param [int] id_item
     * @return menus which the selected item has been deleted
     */
    public function delete($id)
    {
    	return $this->DeleteModelTrait($id,$this->setting);
    }
}
