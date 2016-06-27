<?php

namespace App\Models;

use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Database\Eloquent\Model;

class Type extends Model {

    protected $fillable = [
        'id', 'name', 'created_at', 'updated_at'
    ];
    protected $hidden = [];
    protected $table = 'types';
}

