<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\Helper\HelperController as pr;
use App\Http\Controllers\JSONParser\JSONParserController;
use Illuminate\Http\Request;
use App\Http\Controllers\Merchant\MerchantController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Deal\DealController;

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
        foreach($dealsData as $dealData) {
            // TODO: Add validation in case the following three params are not present
            $merchantId = MerchantController::CreateMerchant($dealData -> cMerchant, $dealData -> nMerchantID, $dealData -> nMasterMerchantID);
        
            // Create the deal
            $deal = DealController::CreateDeal($dealData, $merchantId);
            
            // TODO: Add validation in case the following param is not present
            foreach($dealData -> aCategoriesV2 as $categoryData) {
                // TODO: Add validation in case the following four params are not present
                $categoryId = CategoryController::CreateCategory($categoryData -> cName, $categoryData -> nCategoryID, $categoryData -> nParentID, $categoryData -> bRestricted);
                CategoryController::AddLinkDealCategory($deal -> id, $categoryId);
            }
            
            // TODO: Add validation in case the following param is not present
            pr::show($dealData); die();
            foreach($dealData -> aCategoriesV2 as $categoryData) {
                // TODO: Add validation in case the following four params are not present
                $categoryId = CategoryController::CreateCategory($categoryData -> cName, $categoryData -> nCategoryID, $categoryData -> nParentID, $categoryData -> bRestricted);
                CategoryController::AddLinkDealCategory($deal -> id, $categoryId);
            }
        }
    }

}
