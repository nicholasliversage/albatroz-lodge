<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\BlogsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//home page
Route::get('/', [HomeController::class, 'index']);

//Restaurant
Route::get('/restaurant', [DishesController::class, 'index']);

//About
Route::view('/about', 'about.index');

//Blog
Route::get('/blog', [BlogsController::class, 'index']);


//Contatcts
Route::view('/contact', 'contact.index');

//Rooms
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/show/{id}', [RoomController::class, 'show']);

