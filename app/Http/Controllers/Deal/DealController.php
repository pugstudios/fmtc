<?php

namespace App\Http\Controllers\Deal;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Http\Request;
use App\Models\Deal;

class DealController extends BaseController {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public static function CreateDeal($dealData, $merchantId = 0) {
        // Does the following deal exist in the DB already?
        if(!$deal = Deal::where('code', $dealData -> cCode) -> first()) {
            // Create the deal
            $deal = new Deal();
            $deal -> code = isset($dealData -> cCode) ? $dealData -> cCode : NULL;
            $deal -> network = isset($dealData -> cNetwork) ? $dealData -> cNetwork : NULL;
            $deal -> merchant_id = $merchantId;
            $deal -> label = isset($dealData -> cLabel) ? $dealData -> cLabel : NULL;
            $deal -> image = isset($dealData -> cImage) ? $dealData -> cImage : NULL;
            $deal -> start_date = isset($dealData -> dtStartDate) ? $dealData -> dtStartDate : NULL;
            $deal -> end_date = isset($dealData -> dtEndDate) ? $dealData -> dtEndDate : NULL;
            $deal -> affiliate_url = isset($dealData -> cAffiliateURL) ? $dealData -> cAffiliateURL : NULL;
            $deal -> direct_url = isset($dealData -> cDirectURL) ? $dealData -> cDirectURL : NULL;
            $deal -> skim_links_url = isset($dealData -> cSkimlinksURL) ? $dealData -> cSkimlinksURL : NULL;
            $deal -> fmtc_url = isset($dealData -> cFMTCURL) ? $dealData -> cFMTCURL : NULL;
            $deal -> pixel_html = isset($dealData -> cPixelHTML) ? $dealData -> cPixelHTML : NULL;
            $deal -> sale_price = isset($dealData -> fSalePrice) ? $dealData -> fSalePrice : NULL;
            $deal -> was_price = isset($dealData -> fWasPrice) ? $dealData -> fWasPrice : NULL;
            $deal -> discount = isset($dealData -> fDiscount) ? $dealData -> fDiscount : NULL;
            $deal -> threshold = isset($dealData -> fThreshold) ? $dealData -> fThreshold : NULL;
            $deal -> rating = isset($dealData -> fRating) ? $dealData -> fRating : NULL;
            $deal -> starred = isset($dealData -> bStarred) ? $dealData -> bStarred : NULL;
            $deal -> logo_88x31 = isset($dealData -> cLogo88x31) ? $dealData -> cLogo88x31 : NULL;
            $deal -> logo_120x60 = isset($dealData -> cLogo120x60) ? $dealData -> cLogo120x60 : NULL;
            $deal -> exclusive = isset($dealData -> bExclusive) ? $dealData -> bExclusive : NULL;
            $deal -> link_id = isset($dealData -> nLinkID) ? $dealData -> nLinkID : NULL;
            $deal -> network_name = isset($dealData -> cNetworkName) ? $dealData -> cNetworkName : NULL;
            $deal -> status = isset($dealData -> cStatus) ? $dealData -> cStatus : NULL;
            $deal -> save();
        }
        
        return $deal;
    }

}
