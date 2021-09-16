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
        'name','rooms' ,'description', 'persons', 'bed','view','imgRoom','img1','img2','img3'
    ];

    public function bookings()
    {
        return $this->hasMany(Bookings::class,'id');
    }
}
