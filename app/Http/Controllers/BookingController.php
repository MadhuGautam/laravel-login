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

        $roomData = roomLists::with('bookings')->where('hotel_lists_id', $hotelid)->where('id', $roomid)->
        addSelect(['hotel_lists_id' => hotelLists::select('hotel_name')->whereColumn('hotel_lists_id', 'hotel_lists.id')])->get();

        foreach ($roomData as $book){
            foreach ($book->bookings as $bookData){

                if($bookData->id ==  $bookid)
                {
                    $questData = questLists::where('booking_lists_id', $bookid)->get();
                    $data = $questData->concat($roomData);
                    $msg = $data->all();
                    return view('hotels/bookingDetails', ['data' => $msg]);
                }
                else{

                    return response()->json("No Data Found",404);
                }

            }
        }

        return response()->json("No Data Found",404);

    }

    public function add(Request $request)
    {
        $hotelid = $request->hotelId;
        $roomid = $request->roomId;

        // $hotel = hotelLists::where('id', $hotelid)->get();

        // return view('hotels/addBooking', ['hotelid' => $hotelid, 'roomid' => $roomid, 'hotel' => $hotel ]);

        $roomData = roomLists::where('hotel_lists_id', $hotelid)->where('id', $roomid)->
        addSelect(['hotel_name' => hotelLists::select('hotel_name')->whereColumn('hotel_lists_id', 'hotel_lists.id')])->get();

        return view('hotels/addBooking', ['hotel' => $roomData ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            // 'title' => 'required|unique:posts|max:255',
            // 'body' => 'required',
            'bookdatefrom' => 'required|date|date_format:Y-m-d|after:yesterday',
            'bookdateto' => 'required|date|date_format:Y-m-d|after:yesterday',
            'questContact' => 'required|min:10|max:10',

        ]);




        return $request;
    }
}
