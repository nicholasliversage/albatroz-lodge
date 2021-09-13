<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Reviews;
use Session;

class ReviewController extends Controller
{
    public function store(Request $request){

        $this->validate($request, [
            'review-message' => 'required',    
        ]);

        if(auth()->id()){

        $id = auth()->id();
        $user = User::find($id) ;
        $review = new Reviews();
        $review->description = $request->get('review-message');
        $user->reviews()->save($review);
        
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
