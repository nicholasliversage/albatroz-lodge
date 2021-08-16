<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Dishes;

class HomeController extends Controller
{
    //
    public function index(){
        $rooms = Room::all();
        $dishes = Dishes::all();
        return view('pages.index', compact('rooms','dishes'));
    }
}

