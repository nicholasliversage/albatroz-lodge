<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use Session;

class BookingController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'check_in' => 'required',
            'check_out' => 'required',
            'guests' => 'required',
        ]);

        if(auth()->id()){

        $id = auth()->id();
        $user = User::find($id) ;
        $booking = new Booking();
        $booking->check_in = $request->get('check_in');
        $booking->check_out = $request->get('check_out');
        $booking->guests = $request->get('guests');
        $booking->room_id = null;
        //$booking->user_id = $user->id;
        $user->bookings()->save($booking);
        $notification = [
            'message' => 'Your Request Has Been Sent', 
            'type' => 'success'
        ];
        
        session()->flash('notification', $notification);
        return back();
        }
        else{
            $notification = [
                'message' => 'Please Login First', 
                'type' => 'info'
            ];
            
            session()->flash('notification', $notification);
            return back();
        }
      }
}
