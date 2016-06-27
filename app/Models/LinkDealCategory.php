<?php

namespace App\Models;

use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Database\Eloquent\Model;

class LinkDealCategory extends Model {

    protected $fillable = [
        'id', 'deal_id', 'category_id', 'created_at', 'updated_at'
    ];
    protected $hidden = [];
    protected $table = 'link_deals_categories';
}