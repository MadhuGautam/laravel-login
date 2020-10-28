<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomCatLists extends Model
{
    //
    protected $fillable = [
        'cat_name', 'cat_price','discount'
    ];
}
