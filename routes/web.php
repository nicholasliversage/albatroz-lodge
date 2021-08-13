<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.index');
});

//Restaurant
Route::view('/restaurant', 'restaurant.index');

//About
Route::view('/about', 'about.index');

//Blog
Route::view('/blog', 'blog.index');

//Contatcts
Route::view('/contact', 'contact.index');

//Rooms
Route::view('/rooms', 'rooms.index');

