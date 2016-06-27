<?php

namespace App\Http\Controllers\JSONParser;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class JSONParserController extends BaseController {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * RemoteJSONReader
     * Reads a remote URL and returns the json_decoded version.
     * Method will also check to ensure that the data returned is actually
     * JSON
     * 
     * @param string $url
     * @return mixed json/redirect
     */
    public static function RemoteJSONReader($url) {
        // Get the contents of remote url
        $content = json_decode(file_get_contents($url));

        // Validate data is JSON (otherwise it's useless for us)
        if (json_last_error() !== JSON_ERROR_NONE) {
            return Redirect::back() -> with('error', 'Content of remote url is not correctly formatted JSON');
        } else {
            return $content;
        }
    }

}
