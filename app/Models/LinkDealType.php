<?php

namespace App\Models;

use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Database\Eloquent\Model;

class LinkDealType extends Model {

    protected $fillable = [
        'id', 'deal_id', 'type_id', 'created_at', 'updated_at'
    ];
    protected $hidden = [];
    protected $table = 'link_deals_types';
}