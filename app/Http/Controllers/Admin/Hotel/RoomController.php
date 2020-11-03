<?php


namespace App\Http\Controllers\Admin\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\hotelLists;
use App\roomLists;


class RoomController extends Controller
{
    public function index()
    {
        return "index";
        //echo $data=roomLists::get();
        //return view('hotels/index', ['data' => $data]);
    }

    public function show($id)
    {

        $room = roomLists::with('hotelLists')->where('hotel_lists_id', '=', $id )->get(); //call hotelLists function in App\roomLists
        //$room = roomLists::addSelect(['hotel_lists_id' => hotelLists::select('hotel_name')->whereColumn('hotel_lists_id', 'hotel_lists.id')])->get();

        if(is_null($room)){
            return response()->json(null,404);
        }
        return view('rooms/index', ['data' => $room]);

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
}
