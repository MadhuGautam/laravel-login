<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hotelLists;
use App\roomLists;


class RoomApiController extends Controller
{
    public function index(hotelLists $hotel)
    {
        return $hotel->rooms;
    }

    public function show(hotelLists $hotel, RoomLists $room)
    {
        return $hotel->rooms->find($room->id);
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

    public function delete(Request $request, RoomLists $room)
    {
        $room->delete();

        return response()->json(null, 204);
    }
}
