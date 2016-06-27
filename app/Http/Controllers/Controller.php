<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    // Global data that is sent to views
    protected static $data = array();

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {}
    
    /**
     * AddData
     * Adds data to the data param to be passed to views
     * @param type $class
     * @param type $data
     */
    protected static function AddData($class, $data) {
        self::$data[$class] = $data;
    }

}
