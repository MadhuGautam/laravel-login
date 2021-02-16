<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //             'name' => $data['name'],
    //             'email' => $data['email'],
    //             'password' => Hash::make($data['password']),
    //             'usertype' => "manager",
    //             'hotel_lists_id' => 120,
    //             'api_token' => Hash::make($data['email']),

    //     ]);


    // }
    // protected function registered(Request $request, $user)
    // {
    //     $user->generateToken();
    //     return response()->json(['data' => $user->toArray()], 201);
    // }

    public function register(Request $request){

        $user = new User();
        $user->name= $request->name;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->usertype = "staff";
        $user->verification_code = sha1(time());
        $user->save();

        // if($user !=null){
        //     MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
        //     return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
        // }

        // return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong.'));

        return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created..'));
    }

    public function verifyUser(Request $request){


    }
}
