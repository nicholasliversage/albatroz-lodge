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
                       
            $conflict = Booking::where(function($query){
                $query->where('room_id','!=',null);
            })
         ->whereBetween('check_in',[$startTime, $endTime])
        ->WhereBetween('check_out',[$startTime, $endTime])
        ->Where(function($query) use($request){
            $query->where('check_in','<=',$request->get('check_in'))
                ->where('check_out','>=',$request->get('check_out'));
        })->exists();
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
        
         return redirect('/send-notification');
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



      public function store_single(Request $request,$id){
        $this->validate($request, [
            'check_in' => 'required',
            'check_out' => 'required',
            'guests' => 'required',
        ]);

    

        if(auth()->id()){
            $startTime = $request->get('check_in');
            $endTime = $request->get('check_out');
           
            $conflict = Booking::where(function($query) use ($id){
                $query->where('room_id','=',$id);
            })
         ->whereBetween('check_in',[$startTime, $endTime])
        ->WhereBetween('check_out',[$startTime, $endTime])
        ->Where(function($query) use($request){
            $query->where('check_in','<=',$request->get('check_in'))
                ->where('check_out','>=',$request->get('check_out'));
        })->exists();
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
          $users = User::where('user_type','=','Client')->get();
          $rooms = Room::all();
          return view('admin.pages.reservations', compact('bookings','users','rooms'));
      }

      public function admin_requests(){
        $rooms = Room::all();
        $bookings = Booking::where('room_id','=',null)->get();
        return view('admin.pages.requests', compact('bookings','rooms'));
      }

      public function admin_saveBooking(Request $request,$id){
        $this->validate($request, [
            'room' => 'required'  
        ]);
        $booking = Booking::findOrFail($id);
        $booking->room_id = $request->get('room');;
        $booking->save();
         return back();;
      }

      public function admin_removeRequest($id){
          $booking = Booking::findOrFail($id)->delete();
          
          return back();
      }

      public function admin_newReservation(Request $request){
        $this->validate($request, [
            'cin' => 'required',
            'cout' => 'required',
            'guests' => 'required',
            'client' => 'required',
            'chalet' => 'required',
        ]);  
        
        $id =$request->get('client');
        $user = User::find($id) ;
        $booking = new Booking();
        $booking->check_in = $request->get('cin');
        $booking->check_out = $request->get('cout');
        $booking->guests = $request->get('guests');
        $booking->room_id = $request->get('chalet');
        $user->bookings()->save($booking);

        return back();
      }
}
