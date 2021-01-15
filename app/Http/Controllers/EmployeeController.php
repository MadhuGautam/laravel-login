<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use App\hotelLists;
Use Session;

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

    /**
         * Show the form for creating a new resource.
         * @return \Illuminate\Http\Response

    */
    public function create()
    {
        return view('employee/addEmployee');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request   $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->employee_id){

           $user = User::find($request->employee_id);

            if($request->file != '') {


                $request->validate([
                'file' => 'required|mimes:jpg,png,jpeg|max:2048'
                ]);

                $path = public_path().'/uploads/employees//';

                //code for remove old file
                if($employee->employee_image != ''  && $employee->employee_image != null){
                    $file_old = $path.$employee->employee_image;
                    unlink($file_old);
                }

                $fileName = time().'_'.$request->file->getClientOriginalName();

                $filePath = $request->file->move(public_path('uploads/employee/'), $fileName);
            }
            else{

                if($employee->employee_image != ''  && $employee->employee_image != null){
                    $fileName = $employee->employee_image;
                }


            }
                $employee->hotel_name = $request->hotel_name;
                $employee->hotel_location = $request->hotel_location;
                $employee->hotel_email = $request->hotel_email;
                $employee->hotel_owner = $request->hotel_owner;
                $employee->description = $request->description;
                $employee->no_of_rooms = $request->no_of_rooms;
                $employee->hotel_image = $fileName;

                $employee->added_by = $request->user_id;
                $employee->save();

                return back()
                ->with('success', $employee->hotel_name.' employee editted successfully.');


        }
        else{

            // $employee = hotelLists::create($request->all());

            // return response()->json($employee, 201);
            // $employee = new hotelLists;

            $request->validate([
            'file' => 'required|mimes:jpg,png,jpeg|max:2048'
            ]);

            if($request->file()) {
                $fileName = time().'_'.$request->file->getClientOriginalName();

                $filePath = $request->file->move(public_path('uploads'), $fileName);

            $employee = hotelLists::create([
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
                ->with('success',$employee->hotel_name.' added employee successfully.');

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

        $employee = hotelLists::with('rooms')->findOrFail($id); //call rooms function in App\hotelLists
        if(is_null($employee)){
            return redirect()->back()->withErrors('employee does not exist.');
        }
        return view('hotels/description', ['data' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = hotelLists::with('rooms')->findOrFail($id); //call rooms function in App\hotelLists

        if(is_null($employee)){
            return redirect()->back()->withErrors('employee does not exist.');
        }
        return view('hotels.editHotel', ['data' => $employee]);
    }



    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = hotelLists::find($id);
         if(is_null($employee)){
            return redirect()->back()->withErrors('employee does not exist.');

        }else{

            if($employee->delete()){
               // return response()->json("record deleted", 204);
               return back()->with('success',$employee->employee_name.' employee deleted successfully.');
            }

        }

        return redirect()->back();

    }

}

