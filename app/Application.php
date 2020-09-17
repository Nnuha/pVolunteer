<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'application_title',
        'application_proposal',
        'application_status',
        'user_id'
    ];

  
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
