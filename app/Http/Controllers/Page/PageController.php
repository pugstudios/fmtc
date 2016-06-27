<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Http\Request;

class PageController extends BaseController {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function index(Request $request) {
        // Attach the external URL to the view
        self::AddData('remoteUrl', 'http://pods.formetocoupon.com/6275c1397c7aaafd8ae8ca639276261d.json');

        // Attach the couponJSON if it's in the session
        if ($request -> session() -> has('couponJSON')) {
            self::AddData('couponJSON', $request -> session() -> get('couponJSON'));
        }

        return view('pages.index', self::$data);
    }

}
