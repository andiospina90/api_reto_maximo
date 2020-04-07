<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    protected $fillable = [
        'user_id', 
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function trainer()
    {
        return $this->belongsToMany('App\Trainer','customer_trainer');
    }

   
}
