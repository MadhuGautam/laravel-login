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

            $bookId = bookingLists::insertGetId(
            ['booking_name' => $request->bookingName, 'room_price' => $request->roomPrice, 'room_lists_id'=> $request->roomId, 'hotel_lists_id'=> $request->hotel_id,
             'Booking_num_of_days'=> $request->BookingDays,  'Booking_date_from'=> $request->bookdatefrom,
             'Booking_date_to'=> $request->bookdateto,  'room_price_per_day'=> $request->roomPrice,  'discount_amount'=> $request->discount,
             'charged_booking_amount'=> $request->bookedAmount, 'booking_status'=> "confirmed", 'Total_room_amount'=> $request->bookTotalAmount,
             'Total_paid_amount'=> $request->totalRecievedAmount, 'Payment_mode'=> $request->paymentMode, 'description'=> $request->description, 'added_by'=> 1,
             'booking_from'=> $request->bookingFrom]
        );

        if($bookId > 0)
        {
            $questId = questLists::insertGetId(
                ['booking_lists_id' => $bookId, 'quest_name' => $request->questName, 'quest_image' => $request->questimage,
                'quest_from' => $request->questfrom, 'quest_contact' => $request->questContact, 'purpose' => $request->visitPurpose,
                'num_of_person' => $request->num_of_persons, 'num_of_docs_submit' => 0, 'aadhar_card_url' => "",
                'licence_card_url' => "", 'voter_card_url' => "",
                'other_docs_url' => "", 'checkin_datetime' => $request->bookdatefrom,
                'checkout_datetime' => $request->bookdateto, 'description'=> $request->description, 'added_by'=> 1]
            );
        }

        return $questId;
    }
}
