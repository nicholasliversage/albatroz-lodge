<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'user_type',
        'phone',
        'email',
        'nationality',
        'city',
        'passport',
        'BI',
        'birth',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class,'id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }


  

    public static function boot() {
        parent::boot();
        self::deleting(function($user) { // before delete() method call this
             $user->bookings()->each(function($booking) {
                $booking->delete(); // <-- direct deletion
             });
             // do the rest of the cleanup...
             $user->comments()->each(function($comment) {
                $comment->delete(); // <-- direct deletion
             });
        });
    }
}
