<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use App\hotelLists;
Use Session;
use Illuminate\Support\Facades\Hash;

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
        $hotel_list = hotelLists::select('id','hotel_name')->get();
        return view('employee/addEmployee', ['hotel_list' => $hotel_list]);
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

           $employee = User::find($request->employee_id);

            if($request->file()) {


                $request->validate([
                'file' => 'required|mimes:jpg,png,jpeg|max:2048'
                ]);

                $path = public_path().'/uploads/employees//';

                //code for remove old file
                if($employee->profile_pic != ''  && $employee->profile_pic != null && !(str_contains($employee->profile_pic,"http"))){
                    $file_old = $path.$employee->profile_pic;
                    unlink($file_old);
                }

                $fileName = time().'_'.$request->file->getClientOriginalName();

                $filePath = $request->file->move(public_path('uploads/employee/'), $fileName);
            }
            else{

                if($employee->profile_pic != ''  && $employee->profile_pic != null){
                    $fileName = $employee->profile_pic;
                }
            }

                $employee->hotel_lists_id = $request->hotel_lists_id;
                $employee->salary = $request->salary;
                $employee->name = $request->name;
                $employee->email = $request->email;
                $employee->description = $request->description;
                $employee->password = Hash::make($request->password);
                $employee->profile_pic = $fileName;
                $employee->usertype =$request->user_type;
                $employee->address =$request->address;
                $employee->contact = $request->contact;
                $employee->added_by = $request->added_by;

                $employee->save();

                return back()
                ->with('success', $employee->name.' employee editted successfully.');
        }
        else{
             echo "id not exist"; die();

            $request->validate([
            'file' => 'required|mimes:jpg,png,jpeg|max:2048'
            ]);

            if($request->file()) {
                $fileName = time().'_'.$request->file->getClientOriginalName();

                $filePath = $request->file->move(public_path('uploads/employee/'), $fileName);

            $employee = User::create([
                'hotel_lists_id' => $request->hotel_lists_id,
                'salary' => $request->salary,
                'name' => $request->name,
                'email' => $request->email,
                'description' => $request->description,
                'password' => Hash::make($request->password),
                'profile_pic' => $fileName,
                'usertype' =>$request->user_type,
                'address' =>$request->address,
                'contact' => $request->contact,
                'added_by' => $request->added_by,
                'email_verified_at' => now(),
                'remember_token' => $request->_token,
            ]);

                return back()
                ->with('success',$employee->name.' added employee successfully.');

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

        $data = User::findOrFail($id); //call rooms function in App\hotelLists
        $hotel_list = hotelLists::select('id','hotel_name')->where('id',$data->hotel_lists_id)->get();
        if(is_null($data)){
            return redirect()->back()->withErrors('employee does not exist.');
        }
        // return view('employee/description', array('data'=>$data,'hotel_list'=>$hotel_list));
        return view('employee/profile')->with(compact('data', 'hotel_list'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel_list = hotelLists::select('id','hotel_name')->get();
        $data = User::findOrFail($id); //call rooms function in App\hotelLists

        if(is_null($data)){
            return redirect()->back()->withErrors('employee does not exist.');
        }
        return view('employee.editEmployee')->with(compact('data', 'hotel_list'));;
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::find($id);
         if(is_null($employee)){
            return redirect()->back()->withErrors('employee does not exist.');

        }else{

            if($employee->delete()){

               return back()->with('success',$employee->name.' employee deleted successfully.');
            }

        }

        return redirect()->back();

    }

}

