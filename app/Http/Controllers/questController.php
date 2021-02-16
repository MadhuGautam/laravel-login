<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questLists;

class questController extends Controller
{

    public function details()
    {
        $data = questLists::all();
        return view('quests/index',['data' =>$data]);

    }
}
