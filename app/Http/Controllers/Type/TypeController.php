<?php

namespace App\Http\Controllers\Type;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\LinkDealType;

class TypeController extends BaseController {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public static function CreateType($name) {
        // Does the following deal exist in the DB already?
        if(!$type = Type::where('name', $name) -> first()) {
            // Create the type
            $type = new Type();
            $type -> name = $name;
            $type -> save();
        }
        
        return $type -> id;
    }
    
    /**
     * AddLinkDealCategory
     * Creates a link between a deal and a category
     * 
     * @param integer $dealId
     * @param integer $categoryId
     * @return integer
     */
    public static function AddLinkDealType($dealId, $typeId) {
        // Does the type exist in the DB already?
        if(!$link = LinkDealType::where('deal_id', $dealId) -> where('type_id', $typeId) -> first()) {
            // Create the link
            $link = new LinkDealType();
            $link -> deal_id = $dealId;
            $link -> type_id = $typeId;
            $link -> save();
        }
        
        return $link -> id;
    }

}
