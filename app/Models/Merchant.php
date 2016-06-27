<?php

namespace App\Models;

use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model {

    protected $fillable = [
        'id', 'master_merchant_id', 'name', 'created_at', 'updated_at'
    ];
    protected $hidden = [];
    protected $table = 'merchants';
}

