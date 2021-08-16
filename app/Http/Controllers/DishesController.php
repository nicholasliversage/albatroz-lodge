<?php

namespace App\Http\Controllers;
use App\Models\Dishes;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    //
    public function index(){

       $dishes = Dishes::all();

       return view('restaurant.index', compact('dishes'));
    }
}