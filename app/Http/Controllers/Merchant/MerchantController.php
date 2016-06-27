<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Http\Request;
use App\Models\Merchant;

class MerchantController extends BaseController {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public static function CreateMerchant($name, $id, $masterId) {
        // Does the following merchant exist in the DB already?
        if(!$merchant = Merchant::where('id', $id) -> first()) {
            // Create the merchant
            $merchant = new Merchant();
            $merchant -> name = $name;
            $merchant -> id = $id;
            $merchant -> master_merchant_id = $masterId;
            $merchant -> save();
        }
        
        return $merchant -> id;
    }

}
