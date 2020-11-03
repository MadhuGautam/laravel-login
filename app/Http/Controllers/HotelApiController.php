<?php

namespace App\Http\Controllers;
use App\hotelLists;
use Illuminate\Http\Request;

class HotelApiController extends Controller
{
    public function index()
    {
        return hotelLists::withCount('rooms')->get();
    }

    public function show($id)
    {
        $hotel = hotelLists::with('rooms')->findOrFail($id); //call rooms function in App\hotelLists
        if(is_null($hotel)){
            return response()->json(null,404);
        }
        return $hotel;
    }

    public function store(Request $request)
    {
        //return $request->all();
        $hotel = hotelLists::create($request->all());

        return response()->json($hotel, 201);
    }

    public function update(Request $request, hotelLists $hotel)
    {
        // pass the ContentType as x-www-form-urlencoded from postman put request
        $hotel->update($request->all());

        return response()->json($hotel, 200);
    }

    public function destroy($id)
    {
        $hotel = hotelLists::find($id);
        if(is_null($hotel)){
            return response()->json("record not found",404);

        }else{

            if($hotel->delete()){
                return response()->json("record deleted", 204);
            }
            return response()->json("record not deleted", 500);
        }

    }
}
