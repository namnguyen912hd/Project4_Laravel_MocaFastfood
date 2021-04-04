<?php 

// Recusive Category
	
namespace App\Components;


class Recusive
{
   
   	private $data;
   	private $htmlSlelect = '';

    public function __construct($data)
    {
        $this->data=$data;
    }
    /**
     * loading parentIDs
     * @param  [int] $id   [default = 0]
     * @param  string $text [default = emty]
     * @return all parentIDs
     */
    public function categoryRecusive($parentID,$id=0, $text=''){

    	foreach ($this->data as $value) {
    		if ($value['parentID'] == $id) {
                if (!empty($parentID) && $parentID == $value['id']) {
                    $this->htmlSlelect .= '<option selected value="' . $value['id'] . '">' . $text . $value['name'] . '</option>';
                }
                else {
                    $this->htmlSlelect .= '<option value="' . $value['id'] . '">' . $text . $value['name'] . '</option>';
                }
    			
    			$this->categoryRecusive($parentID,$value['id'], $text . '--');
    		}
    	}
    	return $this->htmlSlelect;
    }




}
	



