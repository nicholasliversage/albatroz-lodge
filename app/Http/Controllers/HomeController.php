<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Dishes;
use App\Models\Blogs;
use App\Models\Reviews;

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
}

