<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name', 
        'event_details',
        'event_note',
        'event_date',
        'event_location',
        'event_status',
        'event_image', 
        'event_availability',
        'admin_id'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class,'event_user','event_id','user_id');
    }
    
}
