<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Room;
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
            $startTime = $request->get('check_in');
            $endTime = $request->get('check_out');
            $booked = Booking::where('room_id','=',null)->get();;
            $conflict = $booked
                ->whereBetween('check_in', [$startTime, $endTime])
                ->orWhereBetween('check_out', [$startTime, $endTime])
                ->orWhere(fn ($q) => $q->where('check_in', '<', $startTime)->where('check_out', '>', $endTime))
                ->exists();
            if ($conflict) {
                $notification = [
                    'message' => 'There is no space available for the chosen dates!', 
                    'type' => 'warning'
                ];
                
                session()->flash('notification', $notification);
                return back();
            }
            else{

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
            'message' => 'Your Request has been sent!', 
            'type' => 'success'
        ];
        
        session()->flash('notification', $notification);
        return back();
    }
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

      public function admin_reservations(){
          $bookings = Booking::where('room_id','!=',null)->get();
          return view('admin.pages.reservations', compact('bookings'));
      }

      public function admin_requests(){
        $rooms = Room::all();
        $bookings = Booking::where('room_id','=',null)->get();
        return view('admin.pages.requests', compact('bookings','rooms'));
      }

      public function admin_saveBooking($id,$room_id){
        $booking = Booking::findOrFail($id);
        $booking->room_id = $room_id;
        $booking->save();
        return back();
      }
}
