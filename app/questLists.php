<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questLists extends Model
{
    protected $fillable = [

        'booking_id','quest_name','quest_image','quest_from','quest_contact','purpose','num_of_person', 'num_of_docs_submit','aadhar_card_url',
        'licence_card_url','voter_card_url','other_docs_url','checkin_datetime', 'checkout_datetime','added_by','description'
    ];

    public function bookingLists(){
        return $this->belongsTo("App\bookingLists");
    }

}
