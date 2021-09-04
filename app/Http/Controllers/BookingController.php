<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'check_in' => 'required',
            'check_out' => 'required',
            'guests' => 'required',
        ]);

        $id = auth()->id();
        $user = User::find($id) ;
        $booking = new Booking();
        $booking->check_in = $request->get('check_in');
        $booking->check_out = $request->get('check_out');
        $booking->guests = $request->get('guests');
        $booking->room_id = null;
        //$booking->user_id = $user->id;
        $user->bookings()->save($booking);
            
        return redirect()->back()->with('Request sent!');
      }
}
