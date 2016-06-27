<?php

namespace App\Models;

use App\Http\Controllers\Helper\HelperController as pr;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $fillable = [
        'id', 'parent_id', 'name', 'restricted', 'created_at', 'updated_at'
    ];
    protected $hidden = [];
    protected $table = 'categories';
}

