<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Dishes;
use App\Models\Blogs;
use App\Models\Reviews;
use App\Models\Booking;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function index(){
        $rooms = Room::all();
        $dishes = Dishes::all();
        $blogs = Blogs::all();
        $reviews = Reviews::all();

        return view('pages.index', compact('rooms','dishes','blogs','reviews'));
    }

    public function admin_index(){
        $reservations = Booking::where('room_id','!=',null)->count();
        $requests = Booking::where('room_id','=',null)->count();
        $rooms = Room::count();
        $dishes = Dishes::count();
        $blogs = Blogs::count();
        $users = User::count();
        return view('admin.dashboard',compact('reservations','requests','rooms','dishes','blogs','users'));

    }
}

