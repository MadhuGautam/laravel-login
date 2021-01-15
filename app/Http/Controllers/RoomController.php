<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\hotelLists;
use App\roomLists;
use App\bookingLists;


class RoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = roomLists::with('bookings')->where('hotel_lists_id', $request->id)->get();
        return $data;
        //return view('hotels/index', ['data' => $data]);

    }

    /**
         * Show the form for creating a new resource.
         * @return \Illuminate\Http\Response

    */
    public function create($hotelId)
    {
        return view('hotels/addRoom', ['hotel_id' =>$hotelId]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {

        //$room = roomLists::with('hotelLists')->findOrFail($id); //call hotelLists function in App\roomLists
        $room = roomLists::addSelect(['hotel_lists_id' => hotelLists::select('hotel_name')->whereColumn('hotel_lists_id', 'hotel_lists.id')])->get();

        if(is_null($room)){
            return response()->json(null,404);
        }
        return $room;

    }

    public function store(Request $request, $hotelId)
    {
        $hotel = hotelLists::findOrFail($hotelId); //call rooms function in App\hotelLists
        if(is_null($hotel)){
            return redirect()->back()->withErrors('Hotel does not exist.');
        }

        $room = roomLists::create(['room_cat' =>$request->room_cat,
        'hotel_lists_id' =>$request->hotel_lists_id,
        'room_availability_status' =>'1',
        'room_price' =>(strcmp($request->room_cat,"luxury") == 0)? 4000: 3000,
        'added_by' =>$request->user_id,
        'description' =>$request->description,
        'room_name' =>$request->room_name]);

        $hotel = hotelLists::with('rooms')->findOrFail($hotelId);
        return redirect()->action('HotelController@show', $hotelId);
       // return view('hotels/description', ['data' => $hotel]);
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


}
