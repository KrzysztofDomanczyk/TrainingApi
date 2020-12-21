<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'title', 'coach_id'
    ];

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function coach() 
    {
        return $this->belongsTo(Coach::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
