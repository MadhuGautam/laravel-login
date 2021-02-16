<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hotelLists;
use App\roomLists;
Use Session;
class HotelController extends Controller
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
    public function index()
    {

        $room_data = roomLists::select('hotel_lists_id', roomLists::raw('count(*) as total_rooms'))->groupBy('hotel_lists_id')->get();
        //return view('booking/index', ['data' => $data]);

        foreach($room_data as $room)
        {
            hotelLists::where('id', $room->hotel_lists_id)->update(['no_of_rooms' => $room->total_rooms]);
        }

        $data = hotelLists::with('rooms')->get();
        return view('hotels/index', ['data' => $data]);
    }

    /**
         * Show the form for creating a new resource.
         * @return \Illuminate\Http\Response

    */
    public function create()
    {
        return view('hotels/addHotel');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request   $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hotel_id){

           $hotel = hotelLists::find($request->hotel_id);

            if($request->file != '') {


                $request->validate([
                'file' => 'required|mimes:jpg,png,jpeg|max:2048'
                ]);

                $path = public_path().'/uploads//';

                //code for remove old file
                if($hotel->hotel_image != ''  && $hotel->hotel_image != null && !(str_contains($hotel->hotel_image,"http"))){
                    $file_old = $path.$hotel->hotel_image;
                    unlink($file_old);
                }

                $fileName = time().'_'.$request->file->getClientOriginalName();

                $filePath = $request->file->move(public_path('uploads'), $fileName);
            }
            else{

                if($hotel->hotel_image != ''  && $hotel->hotel_image != null){
                    $fileName = $hotel->hotel_image;
                }


            }
                $hotel->hotel_name = $request->hotel_name;
                $hotel->hotel_location = $request->hotel_location;
                $hotel->hotel_email = $request->hotel_email;
                $hotel->hotel_owner = $request->hotel_owner;
                $hotel->description = $request->description;
                $hotel->no_of_rooms = $request->no_of_rooms;
                $hotel->hotel_image = $fileName;

                $hotel->added_by = $request->user_id;
                $hotel->save();

                return back()
                ->with('success', $hotel->hotel_name.' Hotel editted successfully.');


        }
        else{

            // $hotel = hotelLists::create($request->all());

            // return response()->json($hotel, 201);
            // $hotel = new hotelLists;

            $request->validate([
            'file' => 'required|mimes:jpg,png,jpeg|max:2048'
            ]);

            if($request->file()) {
                $fileName = time().'_'.$request->file->getClientOriginalName();

                $filePath = $request->file->move(public_path('uploads'), $fileName);

            $hotel = hotelLists::create([
                'hotel_name' => $request->hotel_name,
                'hotel_location' => $request->hotel_location,
                'hotel_email' => $request->hotel_email,
                'hotel_owner' => $request->hotel_owner,
                'description' => $request->description,
                'no_of_rooms' => $request->no_of_rooms,
                'hotel_image' => $fileName,

               'added_by' => $request->user_id,
            ]);

                return back()
                ->with('success',$hotel->hotel_name.' added Hotel successfully.');

            }

        }

    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {

        $hotel = hotelLists::with('rooms')->findOrFail($id); //call rooms function in App\hotelLists
        if(is_null($hotel)){
            return redirect()->back()->withErrors('Hotel does not exist.');
        }
        return view('hotels/description', ['data' => $hotel]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = hotelLists::with('rooms')->findOrFail($id); //call rooms function in App\hotelLists

        if(is_null($hotel)){
            return redirect()->back()->withErrors('Hotel does not exist.');
        }
        return view('hotels.editHotel', ['data' => $hotel]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request   $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request)
    // {
    //     echo "update call"; die();
    //     $hotel = hotelLists::find($request->hotel_id);
    //     $request->validate([
    //         'file' => 'required|mimes:jpg,png,jpeg|max:2048'
    //         ]);


    //     if($request->file()) {
    //         $fileName = time().'_'.$request->file->getClientOriginalName();
    //         //$filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
    //         $filePath = $request->file->move(public_path('uploads'), $fileName);

    //         $hotel->hotel_name = $request->hotel_name;
    //         $hotel->hotel_location = $request->hotel_location;
    //         $hotel->hotel_email = $request->hotel_email;
    //         $hotel->hotel_owner = $request->hotel_owner;
    //         $hotel->description = $request->description;
    //         $hotel->no_of_rooms = $request->no_of_rooms;
    //         $hotel->hotel_image = $fileName;
    //         $hotel->save();

    //         return back()
    //         ->with('success',$hotel->id.' Hotel updated successfully.');

    //     }

    //     return index();

    // }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = hotelLists::find($id);
         if(is_null($hotel)){
            return redirect()->back()->withErrors('Hotel does not exist.');

        }else{

            if($hotel->delete()){
               // return response()->json("record deleted", 204);
               return back()->with('success',$hotel->hotel_name.' Hotel deleted successfully.');
            }

        }

        return redirect()->back();

    }

}
