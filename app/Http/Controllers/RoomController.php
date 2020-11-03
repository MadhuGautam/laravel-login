<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\hotelLists;
use App\roomLists;


class RoomController extends Controller
{
    public function index1($hotel_id)
    {
        $data=roomLists::get();
        return "vbhzxcvb";
    }

    public function show($id)
    {
        return "vbhzxcvb";
        //$room = roomLists::with('hotelLists')->findOrFail($id); //call hotelLists function in App\roomLists
        $room = roomLists::addSelect(['hotel_lists_id' => hotelLists::select('hotel_name')->whereColumn('hotel_lists_id', 'hotel_lists.id')])->get();

        if(is_null($room)){
            return response()->json(null,404);
        }
        return $room;

    }

    public function store(Request $request)
    {
        return "vbhzxcvb";
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

    public function index()
    {
        $msg = roomLists::get();
       // return response()->json(array('msg'=> $msg), 200);
       return response()->json($msg);
    }
}
