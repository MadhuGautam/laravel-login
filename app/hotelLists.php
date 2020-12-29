<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hotelLists extends Model
{
    protected $fillable = [
        'hotel_name', 'hotel_email','hotel_location','hotel_image', 'hotel_owner', 'added_by' , 'description'
    ];
    public function rooms()
    {
        return $this->hasMany('App\roomLists');
    }
}
