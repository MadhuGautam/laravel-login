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
        $hotel = hotelLists::with('rooms')->findOrFail($id);
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

    public function update($id, Request $request)
    {
        //$data = hotelLists::find(11);
        return  $request->all();
        $hotel->update($request->all());

        return response()->json($hotel, 200);
    }

    public function delete($id)
    {
        //$hotel->delete();
        DB::table('hotelLists')->where('id', $id)->delete();

        return response()->json(null, 204);
    }
}
