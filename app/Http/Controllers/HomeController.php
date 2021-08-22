<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Dishes;
use App\Models\Blogs;

class HomeController extends Controller
{
    //
    public function index(){
        $rooms = Room::all();
        $dishes = Dishes::all();
        $blogs = Blogs::all();
        return view('pages.index', compact('rooms','dishes','blogs'));
    }
}

