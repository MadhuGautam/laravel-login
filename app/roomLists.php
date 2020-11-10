<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomLists extends Model
{
    protected $fillable = [
        'room_cat', 'room_availability_status','hotel_lists_id', 'description', 'added_by'
    ];

    public function hotelLists(){
        return $this->belongsTo("App\hotelLists");
    }

    public function bookings()
    {
        return $this->hasMany('App\bookingLists');
    }

}
