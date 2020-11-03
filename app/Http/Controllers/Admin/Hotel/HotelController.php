<?php

namespace App\Http\Controllers\Admin\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\hotelLists;


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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {

        $hotel = hotelLists::with('rooms')->findOrFail($id); //call rooms function in App\hotelLists
        if(is_null($hotel)){
            return response()->json(null,404);
        }
        return view('hotels/description', ['data' => $hotel]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = hotelLists::with('rooms')->get();
        return view('hotels/index', ['data' => $data]);
    }


}
