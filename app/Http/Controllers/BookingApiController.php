<?php

namespace App\Http\Controllers;

use App\bookingLists;
use App\hotelLists;
use App\roomLists;
use Illuminate\Http\Request;

class BookingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return bookingLists::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = bookingLists::create($request->all());
        $hotel_id = $request->input('hotel_lists_id');
        $room_id = $request->input('room_lists_id');
        RoomLists::where('hotel_lists_id',$hotel_id)->where('id',$room_id)->update(['room_availability_status' => 0]);
        return response()->json($booking, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bookingLists  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(bookingLists $booking)
    {
        $booking = bookingLists::findOrFail($id); //call hotelLists function in App\roomLists
        if(is_null($booking)){
            return response()->json(null,404);
        }
        return $booking;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bookingLists  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(bookingLists $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bookingLists  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bookingLists $booking)
    {
        $booking->update($request->all());

        return response()->json($booking, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bookingLists  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(bookingLists $booking)
    {
        $booking->delete();

        return response()->json("record deleted", 204);
    }
}
