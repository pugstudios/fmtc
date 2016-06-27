<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;

class HelperController extends Controller {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Show
     * Formates print_r into something more useable
     * @param type $array
     */
    public static function show($array) {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

}
