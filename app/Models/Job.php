<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'address',
        'city',
        'phone',
        'business_type',
        'profession',
        'picture',
        'description',
        'user_id'
    ];

     //Create relationship between user and job
    public function user()
    {
        return $this->belongsTo(User::class);
        
    }

     //Create relationship between user and job
     public function comments()
     {
         return $this->hasMany(Comment::class);
         
     }
}
