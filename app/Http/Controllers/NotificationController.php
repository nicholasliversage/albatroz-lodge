<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use Notification;
use App\Notifications\OffersNotification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        return view('product');
    }
    
    public function sendOfferNotification() {
        $userSchema = User::first();
  
        $offerData = 1;
        
  
        Notification::send($userSchema, new OffersNotification($offerData));
        $notification = [
            'message' => 'Your Request has been sent!', 
            'type' => 'success'
        ];
        
        session()->flash('notification', $notification);
        return redirect('/');;
   
    }
}