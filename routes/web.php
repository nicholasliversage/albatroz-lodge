<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UsersController;
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
Route::get('/about', [HomeController::class, 'about']);

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
Route::get('/dashboard', [HomeController::class, 'admin_index'])->middleware('auth');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Registration
Route::post('custom-Registration', [RegisterController::class,'store'])->name('register.custom');

//Review
Route::post('Review', [ReviewController::class,'store'])->name('review.custom');

//admin-dishes
Route::get('/admin/dishes', [DishesController::class, 'admin_index'])->middleware('auth');;
Route::post('/admin/dishes/delete/{id}', [DishesController::class, 'admin_remove'])->name('dish.delete')->middleware('auth');;
Route::post('/admin/dishes/add', [DishesController::class, 'admin_add'])->name('dish.add')->middleware('auth');;
Route::post('/admin/dishes/edit/{id}', [DishesController::class, 'admin_edit'])->name('dish.edit')->middleware('auth');;

//admin-rooms
Route::get('/admin/rooms', [RoomController::class, 'admin_index'])->middleware('auth');;
Route::post('/admin/rooms/add', [RoomController::class, 'admin_add'])->name('room.add')->middleware('auth');;
Route::post('/admin/rooms/delete/{id}', [RoomController::class, 'admin_remove'])->name('room.delete')->middleware('auth');;
Route::post('/admin/rooms/edit/{id}', [RoomController::class, 'admin_edit'])->name('room.edit')->middleware('auth');;

//admin-blogs
Route::get('/admin/blogs', [BlogsController::class, 'admin_index'])->middleware('auth');;
Route::post('/admin/blogs/remove/{id}', [BlogsController::class, 'admin_remove'])->name('blog.remove')->middleware('auth');;
Route::post('/admin/blogs/add', [BlogsController::class, 'admin_add'])->name('blog.add')->middleware('auth');;
Route::post('/admin/blogs/edit/{id}', [BlogsController::class, 'admin_edit'])->name('blog.edit')->middleware('auth');;

//admin-users
Route::get('/admin/users', [UsersController::class, 'admin_index'])->middleware('auth');;
Route::post('/admin/users/remove/{id}', [UsersController::class, 'admin_removeUser'])->name('user.remove')->middleware('auth');;
Route::post('/admin/users/add', [UsersController::class, 'admin_AddUser'])->name('user.create')->middleware('auth');;
Route::post('/admin/users/edit/{id}', [UsersController::class, 'admin_EditUser'])->name('user.edit')->middleware('auth');;

//admin-bookings
Route::get('/admin/reservations', [BookingController::class, 'admin_reservations'])->middleware('auth');;
Route::get('/admin/requests', [BookingController::class, 'admin_requests'])->middleware('auth');;
Route::post('/admin/requests/{id}', [BookingController::class, 'admin_saveBooking'])->name('booking.save')->middleware('auth');;
Route::post('/admin/requests/remove/{id}',[BookingController::class, 'admin_removeRequest'] )->name('request.delete')->middleware('auth');;;
Route::post('/admin/reservations/save',[BookingController::class, 'admin_newReservation'] )->name('reservation.save')->middleware('auth');;;

