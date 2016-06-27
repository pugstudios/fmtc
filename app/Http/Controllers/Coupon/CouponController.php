<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\Helper\HelperController as pr;
use App\Http\Controllers\JSONParser\JSONParserController;
use Illuminate\Http\Request;
use App\Http\Controllers\Merchant\MerchantController;

class CouponController extends BaseController {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function createCoupon(Request $request) {
        // Validation
        $this -> validate($request, [
            'remoteUrl' => 'required|url',
        ]);
        
        // Fetch the JSON content
        $content = JSONParserController::RemoteJSONReader($request -> get('remoteUrl'));
        
        // Capture coupon & deal data
        $couponData = $content -> rsPod;
        $dealsData = $content -> aDeals[0]; // Hack here since there seems to be one extra lvl of unknown data
        
        // Data Storage
        foreach($dealsData as $deal) {
            // TODO: Add validation in case the following three params are not present
            MerchantController::CreateMerchant($deal -> cMerchant, $deal -> nMerchantID, $deal -> nMasterMerchantID);
            
            pr::show($deal); die();
        }
    }

}
