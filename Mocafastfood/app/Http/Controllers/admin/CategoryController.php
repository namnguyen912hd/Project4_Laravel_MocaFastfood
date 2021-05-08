<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\category;
use App\Components\Recusive;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Traits\DeleteModelTrait;

class CategoryController extends Controller
{
    use DeleteModelTrait;
    private $category;


    public function __construct(Category $category){
       
        $this->category = $category;
    }

    /**
     * category page
     * @return void
     */
	public function index(){
        $categories = $this->category->latest('id')->paginate(5);
    	return view('admin.category.index', compact('categories'));
    }

    /**
     * create add_category page
     * @return void
     */
    public function create(){
        $htmlOption = $this->getCategory($parentID='');
        return view('admin.category.add', compact('htmlOption'));
    }

    /**
     * store new category into database
     * @param  Request $request [user enter data on add_category page]
     * @return void
     */
    public function store(Request $request){

        $this->category->insert([
            'name'=> $request->name,
            'parentID'=> $request->parentID,
            'slug'=> Str::slug( $request->name)
        ]);
        
        // route to category page
        return redirect() -> route('categories.index');
    }

    /**
     * get recusive category
     * @param  [int] $parentID [parent_ID category]
     * @return [list] list category order by parentID
     */
    public function getCategory($parentID)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentID);
        return $htmlOption;
    }
    

    /**
     * edit category papge
     * @param  [int] $id [categoryID]
     * @return [void]   
     */
    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parentID);
        
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }


    /**
     * updating category data
     * @param  [int]  $id      [categoryID]
     * @param  Request $request [new data from input user]
     * @return void
     */
    public function update($id, Request $request)
    {

        // $this->category->find($id)->update([
        //     'name'=> $request->name,
        //     'parentID' => $request->parentID,
        //     'slug' => Str::slug( $request->name)
        // ]);

        $category = $this->category->find($id);
        $category->name = $request->name;
        $category->parentID = $request->parentID;
        $category->slug = Str::slug( $request->name);
        $category->save();

        return redirect() -> route('categories.index');
    }
    /**
     * deleting 1 item
     * @param [int] categoryID
     * @return void
     */
    public function delete($id)
    {
        return $this->DeleteModelTrait($id,$this->category);
    }

}
