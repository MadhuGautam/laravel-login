<?php

namespace App\Http\Controllers;
use App\roomLists;
use App\bookingLists;
use App\hotelLists;
use App\questLists;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $hotelid = $request->hotelId;
        $roomid = $request->roomId;
        $bookid = $request->bookId;

        // $msg = roomLists::with('bookings')->where('hotel_lists_id', $hotelid)->where('id', $roomid)->
        // addSelect(['hotel_lists_id' => hotelLists::select('hotel_name')->whereColumn('hotel_lists_id', 'hotel_lists.id')])->get();

        $roomData = roomLists::with('bookings')->where('hotel_lists_id', $hotelid)->where('id', $roomid)->
        addSelect(['hotel_lists_id' => hotelLists::select('hotel_name')->whereColumn('hotel_lists_id', 'hotel_lists.id')])->get();

        $questData = questLists::where('booking_lists_id', $bookid)->get();
        $data = $questData->concat($roomData);
        $msg = $data->all();

        return view('hotels/bookingDetails', ['data' => $msg]);
    }

    public function addBooking(Request $request)
    {
        $hotelid = $request->hotelId;
        $roomid = $request->roomId;

        $hotel = hotelLists::where('id', $hotelid)->get();

        return view('hotels/addBooking', ['hotelid' => $hotelid, 'roomid' => $roomid, 'hotel' => $hotel ]);
    }
}
