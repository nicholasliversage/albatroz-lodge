<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;

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
Route::get('/blogs/show/{id}', [BlogsController::class, 'show']);
Route::post('/blogs/comment/{id}', [BlogsController::class, 'storeComment'])->name('blogs.comment');

//Contatcts
Route::view('/contact', 'contact.index');

//Rooms
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/show/{id}', [RoomController::class, 'show']);

//Bookings
Route::post('/booking', [BookingController::class, 'store'])->name('booking.make');


//Admin Page

//Login

Auth::routes();

// dashboard
Route::get('/dashboard', function() {
    return view('admin.dashboard');
  })->middleware('auth');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Registration
Route::post('custom-Registration', [RegisterController::class,'store'])->name('register.custom');

//Review
Route::post('Review', [ReviewController::class,'store'])->name('review.custom');

//admin-dishes
Route::get('/admin/dishes', [DishesController::class, 'admin_index'])->middleware('auth');;

//admin-rooms
Route::get('/admin/rooms', [RoomController::class, 'admin_index'])->middleware('auth');;

//admin-blogs
Route::get('/admin/blogs', [BlogsController::class, 'admin_index'])->middleware('auth');;
