<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomLists extends Model
{
    protected $fillable = [
        'room_cat', 'room_availability_status','hotel_lists_id',
    ];

    public function hotelLists(){
        return $this->belongsTo("App\hotelLists");
    }
}
