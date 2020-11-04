<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\hotelLists;
use App\roomLists;
use App\bookingLists;


class RoomController extends Controller
{
    public function index1($hotel_id)
    {
        $data=roomLists::get();
        return "vbhzxcvb";
    }

    public function show($id)
    {

        //$room = roomLists::with('hotelLists')->findOrFail($id); //call hotelLists function in App\roomLists
        $room = roomLists::addSelect(['hotel_lists_id' => hotelLists::select('hotel_name')->whereColumn('hotel_lists_id', 'hotel_lists.id')])->get();

        if(is_null($room)){
            return response()->json(null,404);
        }
        return $room;

    }

    public function store(Request $request)
    {

        $room = roomLists::create($request->all());

        return response()->json($room, 201);
    }

    public function update(Request $request, RoomLists $room)
    {
        $room->update($request->all());

        return response()->json($room, 200);
    }

    public function destroy(Request $request, RoomLists $room)
    {
        $room->delete();

        return response()->json("record deleted", 204);
    }

    // public function index(Request $request)
    // {
    //     $id = $_REQUEST['id'];
    //     $bookingDate = $_REQUEST['bookingDate'];
    //     $msg = roomLists::with('bookings')->where('hotel_lists_id', $id)->where('created_at', $bookingDate)->get();
    //    // return response()->json(array('msg'=> $msg), 200);
    //    return response()->json($msg);
    // }

    public function index(Request $request)
    {
        $id = $_REQUEST['id'];
        $bookingDate = $_REQUEST['bookingDate'];
        $msg = roomLists::with('bookings')->where('hotel_lists_id', $id)->get();
       // addSelect(['booking_status' => bookingLists::select('hotel_name')->whereColumn('hotel_lists_id', 'hotel_lists.id')])->get();
        //where('created_at', $bookingDate)->get();
       // return response()->json(array('msg'=> $msg), 200);
    //    ->where('Booking_date_from', '=', $bookingDate->toDateTimeString())->orWhere('Booking_date_to', '>=', $bookingDate->toDateTimeString())
       return response()->json($msg);
    }
}
