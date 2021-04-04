<?php

namespace App\Http\Controllers;

use App\models\menu;
use Illuminate\Http\Request;
use App\Components\RecusiveMenu;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class MenuController extends Controller
{
    private $menu;


    public function __construct(menu $menu){    
        $this->menu = $menu;
    }

   
	public function index(){
        $menus = $this->menu->latest('id')->paginate(5);
    	return view('admin.menu.index', compact('menus'));
    }

    /**
    * creating add_menu page
    * @return void
    */
    public function createMenu(){
        $htmlOption = $this->getmenu($parentID='');
        return view('admin.menu.add', compact('htmlOption'));
    }

    public function storeMenu(Request $request){

        $this->menu->insert([
            'name'=> $request->name,
            'parentID' => $request->parentID,
            'slug' => Str::slug( $request->name)
        ]);
        // route to menu page
        return redirect() -> route('menus.index');
    }

    public function getmenu($parentID)
    {
        $data = $this->menu->all();
        $recusive = new RecusiveMenu($data);
        $htmlOption = $recusive->menuRecusive($parentID);
        return $htmlOption;
    }

    public function editMenu($id)
    {
        $menu = $this->menu->find($id);
        $htmlOption = $this->getmenu($menu->parentID);
        
        return view('admin.menu.edit', compact('menu', 'htmlOption'));
    }


    public function updateMenu($id, Request $request)
    {
        // $this->menu->find($id)->update([
        //     'name'=> $request->name,
        //     'parentID' => $request->parentID,
        //     'slug' => Str::slug( $request->name)
        // ]);
        // 
        $menu = $this->menu->find($id);
        $menu->name = $request->name;
        $menu->parentID = $request->parentID;
        $menu->slug = Str::slug( $request->name);
        $menu->save();

        return redirect() -> route('menus.index');
    }
    /**
     * deleting 1 item
     * @param [int] id_item
     * @return menus which the selected item has been deleted
     */
    public function deleteMenu($id)
    {
        $this->menu->find($id)->delete();
         return redirect() -> route('menus.index');
    }
}
