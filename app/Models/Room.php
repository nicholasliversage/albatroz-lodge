<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','rooms' ,'description','price', 'persons', 'bed','view','imgRoom','img1','img2','img3'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class,'id');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($room) { // before delete() method call this
             $room->bookings()->each(function($booking) {
                $booking->delete(); // <-- direct deletion
             });   
        });
    }
}
