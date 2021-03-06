<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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

     public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nationality' => ['required','string'],
            'city' => ['required','string'],
            'ID' => ['required','string'],
            'birth' => ['required','string'],
            'passport' => ['required','string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         $check->save();

         $notification = [
            'message' => 'Registration Successful', 
            'type' => 'success'
        ];
        
        session()->flash('notification', $notification);
         return redirect()->back();
     }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    { 
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],

            'nationality' => $data['nationality'],
            'city' => $data['city'],
            'passport' => $data['passport'],
            'BI' => $data['ID'],
            'birth' => $data['birth'],

            'user_type' => 'Client',
            'password' =>$data['password'],
        ]);
    }
}
