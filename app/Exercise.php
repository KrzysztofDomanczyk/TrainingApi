<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'title', 'training_id'
    ];

    public function training() 
    {
        return $this->belongsTo(Training::class);
    }
}
