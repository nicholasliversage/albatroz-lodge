<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function admin_index(){

        $users = User::all();
        return view('admin.pages.users', compact('users'));
    }
}
