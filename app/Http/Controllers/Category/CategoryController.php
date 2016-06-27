<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\LinkDealCategory;

class CategoryController extends BaseController {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * CreateCategory
     * Creates a new category in the system or returns the category id if it
     * already exists
     * 
     * @param string $name
     * @param integer $id
     * @param integer $parentId
     * @param boolean $restricted
     * @return integer
     */
    public static function CreateCategory($name, $id, $parentId = 0, $restricted = 0) {
        // Does the following category exist in the DB already?
        if(!$category = Category::where('id', $id) -> first()) {
            // Create the category
            $category = new Category();
            $category -> id = $id;
            $category -> parent_id = $parentId;
            $category -> name = $name;
            $category -> restricted = $restricted;
            $category -> save();
        }
        
        return $category -> id;
    }
    
    public static function AddLinkDealCategory($dealId, $categoryId) {
        // Does the link exist in the DB already?
        if(!$link = LinkDealCategory::where('deal_id', $dealId) -> where('category_id', $categoryId) -> first()) {
            // Create the link
            $link = new LinkDealCategory();
            $link -> deal_id = $dealId;
            $link -> category_id = $categoryId;
            $link -> save();
        }
        
        return $link -> id;
    }

}
