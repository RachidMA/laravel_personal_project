<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'job_id', 'comment', 'rating'
    ];

    //Create relationship between comments and product
    public function job()
    {
        return $this->belongsTo(Job::class);
        
    }
}