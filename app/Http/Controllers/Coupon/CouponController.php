<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\Helper\HelperController as pr;
use App\Http\Controllers\JSONParser\JSONParserController;
use Illuminate\Http\Request;
use App\Http\Controllers\Merchant\MerchantController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Deal\DealController;
use App\Http\Controllers\Type\TypeController;
use Illuminate\Support\Facades\Cache;
use App\Models\Coupon;
use Illuminate\Support\Facades\Log;

class CouponController extends BaseController {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function fetchCoupon(Request $request) {
        // Fetch the JSON content
        $content = JSONParserController::RemoteJSONReader($request -> get('remoteUrl'));
        
        // TODO: Add validation in case the following param is not present
        // Pull coupon from the cache if it's available
        if(!$coupon = Cache::get('coupon_' . $content -> rsPod -> nPodID)) {
            Log::info('created');
            $coupon = self::CreateCoupon($content);
            
            // Store the coupon in the cache (10 minutes)
            Cache::put('coupon_' . $content -> rsPod -> nPodID, $coupon, 10);
        } else {
            Log::info('pulled from cache');
        }
        
        return $coupon;
    }
    
    /**
     * CreateCoupon
     * Creates a new coupon in the system or returns a coupon if it exists
     * 
     * @param json $content
     * @return \App\Http\Controllers\Coupon\Coupon
     */
    private static function CreateCoupon($content) {
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
            foreach($dealData -> aTypes as $typeData) {
                // TODO: Add validation in case the following param is not present
                $typeId = TypeController::CreateType($typeData);
                TypeController::AddLinkDealType($deal -> id, $typeId);
            }
        }
        
        // Does the following coupon exist in the DB already?
        if(!$coupon = Coupon::where('pod_id', $couponData -> nPodID) -> first()) {
                        
            // Create the coupon
            $coupon = new Coupon();
            $coupon -> pod_id = isset($couponData -> nPodID) ? $couponData -> nPodID : NULL;
            $coupon -> deal_id = isset($couponData -> nSingleDealID) ? $couponData -> nSingleDealID : NULL;
            $coupon -> title = isset($couponData -> cTitle) ? $couponData -> cTitle : NULL;
            $coupon -> md5 = isset($couponData -> cMD5) ? $couponData -> cMD5 : NULL;
            $coupon -> width = isset($couponData -> nWidth) ? $couponData -> nWidth : NULL;
            $coupon -> max_offers = isset($couponData -> nMaxOffers) ? $couponData -> nMaxOffers : NULL;
            $coupon -> max_store_offers = isset($couponData -> nMaxStoreOffers) ? $couponData -> nMaxStoreOffers : NULL;
            $coupon -> sort_col = isset($couponData -> cSortCol) ? $couponData -> cSortCol : NULL;
            $coupon -> merchant_display = isset($couponData -> cSortDir) ? $couponData -> cSortDir : NULL;
            $coupon -> sort_deals_by = isset($couponData -> cMerchantDisplay) ? $couponData -> cMerchantDisplay : NULL;
            $coupon -> display_powered_by = isset($couponData -> cSortDealsBy) ? $couponData -> cSortDealsBy : NULL;
            $coupon -> keyword = isset($couponData -> bDisplayPoweredBy) ? $couponData -> bDisplayPoweredBy : NULL;
            $coupon -> country = isset($couponData -> cCountry) ? $couponData -> cCountry : NULL;
            $coupon -> zip_code = isset($couponData -> nZipCode) ? $couponData -> nZipCode : NULL;
            $coupon -> miles = isset($couponData -> nMiles) ? $couponData -> nMiles : NULL;
            $coupon -> backfill_html = isset($couponData -> cBackfillHTML) ? $couponData -> cBackfillHTML : NULL;
            $coupon -> background_color = isset($couponData -> cBackgroundColor) ? $couponData -> cBackgroundColor : NULL;
            $coupon -> text_color = isset($couponData -> cTextColor) ? $couponData -> cTextColor : NULL;
            $coupon -> well_color = isset($couponData -> cWellColor) ? $couponData -> cWellColor : NULL;
            $coupon -> title_color = isset($couponData -> cTitleColor) ? $couponData -> cTitleColor : NULL;
            $coupon -> link_color = isset($couponData -> cLinkColor) ? $couponData -> cLinkColor : NULL;
            $coupon -> border_color = isset($couponData -> cBorderColor) ? $couponData -> cBorderColor : NULL;
            $coupon -> button_color = isset($couponData -> cButtonColor) ? $couponData -> cButtonColor : NULL;
            $coupon -> button_text_color = isset($couponData -> cButtonTextColor) ? $couponData -> cButtonTextColor : NULL;
            $coupon -> coupon_color = isset($couponData -> cCouponColor) ? $couponData -> cCouponColor : NULL;
            $coupon -> custom_css = isset($couponData -> cCustomCSS) ? $couponData -> cCustomCSS : NULL;
            $coupon -> template_id = isset($couponData -> nTemplateID) ? $couponData -> nTemplateID : NULL;
            $coupon -> group_by = isset($couponData -> cGroupBy) ? $couponData -> cGroupBy : NULL;
            $coupon -> display_style = isset($couponData -> cDisplayStyle) ? $couponData -> cDisplayStyle : NULL;
            $coupon -> group_limit = isset($couponData -> nGroupLimit) ? $couponData -> nGroupLimit : NULL;
            $coupon -> show_logo = isset($couponData -> bShowLogo) ? $couponData -> bShowLogo : NULL;
            $coupon -> show_button = isset($couponData -> bShowButton) ? $couponData -> bShowButton : NULL;
            $coupon -> show_ribbon = isset($couponData -> bShowRibbon) ? $couponData -> bShowRibbon : NULL;
            $coupon -> sub_id = isset($couponData -> nSubID) ? $couponData -> nSubID : NULL;
            $coupon -> application_code = isset($couponData -> applicationCode) ? $couponData -> applicationCode : NULL;
            $coupon -> opm_id = isset($couponData -> nOPMID) ? $couponData -> nOPMID : NULL;
            $coupon -> sub_domain = isset($couponData -> cSubdomain) ? $couponData -> cSubdomain : NULL;
            $coupon -> save();
        }
        
        return $coupon;
    }

}
