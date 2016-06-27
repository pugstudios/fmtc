<?php

namespace App\Models;

use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model {

    protected $fillable = [
        'id', 'code', 'network', 'merchant_id', 'label', 'image', 'start_date',
        'end_date', 'affiliate_url', 'direct_url', 'skim_links_url', 'fmtc_url', 'pixel_html',
        'sale_price', 'was_price', 'discount', 'threshold', 'rating', 'starred', 'logo_88x31',
        'logo_120x60', 'exclusive', 'link_id', 'network_name', 'status', 'created_at',
        'updated_at'
    ];
    protected $hidden = [];
    protected $table = 'deals';
}

