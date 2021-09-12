<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
{
  if (auth()->user()->user_type == 'Administrator')
  {
    return 'dashboard';  // admin dashboard path
  }else if(auth()->user()->user_type == 'Client')
  {
    $notification = [
      'message' => 'Login Successful', 
      'type' => 'success'
  ];
  
  session()->flash('notification', $notification);
    return '/';  // admin dashboard path
  }  
  else {
    return 'admin';  // member dashboard path
  }
  
}

protected function loggedOut(Request $request) {
  $notification = [
    'message' => 'You Are Now Logged Out', 
    'type' => 'info'
];

session()->flash('notification', $notification);
    return redirect('/');  
}
}
