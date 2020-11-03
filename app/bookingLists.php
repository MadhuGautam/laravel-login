<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookingLists extends Model
{
    protected $fillable = [
        'booking_name', 'Booking_date_from', 'Booking_date_to','room_price','booking_from','Booking_num_of_days','room_lists_id','hotel_lists_id','room_price_per_day', 'discount_amount', 'booking_status','charged_booking_amount',
        'Total_room_amount','Total_paid_amount','Payment_mode','description','added_by'
    ];
}
