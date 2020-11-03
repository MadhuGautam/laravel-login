<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use App\hotelLists;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware(['auth', 'verified']); //verified enabled when email verification on web.php uncomment and having smtp details

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = User::addSelect(['hotel_lists_id' => hotelLists::select('hotel_name')->whereColumn('hotel_lists_id', 'hotel_lists.id')])->where('usertype',"!=",'admin')->get();
        return view('employee/employee', ['data' => $data]);
    }
}
