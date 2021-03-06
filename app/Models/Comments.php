<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description','blogs_id','user_id'
    ];

    public function blog()
    {
        return $this->belongsTo(Blogs::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
