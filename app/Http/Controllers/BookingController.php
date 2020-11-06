<?php

namespace App\Http\Controllers;
use App\roomLists;
use App\bookingLists;
use App\hotelLists;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $hotelid = $request->hotelId;
        $roomid = $request->roomId;

        $msg = roomLists::with('bookings')->where('hotel_lists_id', $hotelid)->where('id', $roomid)->
        addSelect(['hotel_lists_id' => hotelLists::select('hotel_name')->whereColumn('hotel_lists_id', 'hotel_lists.id')])->get();

        return view('hotels/bookingDetails', ['data' => $msg]);
    }
}
