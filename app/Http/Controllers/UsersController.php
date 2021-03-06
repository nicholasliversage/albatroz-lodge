<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function admin_index(){

        if(auth()->user()->user_type == 'Administrator')
        $users = User::all();
        else
        $users = User::where('user_type','=','Client')->get();

        return view('admin.pages.users', compact('users'));
    }

    public function admin_removeUser($id){
        $user = User::findOrFail($id)->delete();
          
          return back();
    }

    public function admin_AddUser(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nationality' => ['required','string'],
            'city' => ['required','string'],
            'ID' => ['required','string'],
            'birth' => ['required','string'],
            'passport' => ['required','string'],
            'type' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        $check->save();

        return back();
    }

    public function admin_EditUser(Request $request,$id){

        $result = User::findOrFail($id)
        ->update([
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'phone' => $request->get('phone'),
           'user_type' => $request->get('type')
       ]);

        return back();
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
            'user_type' =>$data['type'],
            'password' =>$data['password'],
        ]);
    }
}
