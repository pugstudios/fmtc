<?php

namespace App\Models;

use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model {

    protected $fillable = [
        'id', 'pod_id', 'title', 'md5', 'width', 'max_offers', 'max_store_offers',
        'sort_col', 'sort_dir', 'merchant_display', 'sort_deals_by', 'display_powered_by', 'keyword',
        'country', 'zip_code', 'miles', 'backfill_html', 'background_color', 'text_color', 'well_color',
        'title_color', 'link_color', 'border_color', 'button_color', 'button_text_color', 'coupon_color',
        'custom_css', 'template_id', 'group_by', 'display_style', 'group_limit', 'show_logo', 'show_button',
        'show_ribbon', 'sub_id', 'application_code', 'opm_id', 'sub_domain', 'created_at', 'updated_at'
    ];
    protected $hidden = [];
    protected $table = 'coupons';
}

