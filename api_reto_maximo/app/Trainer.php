<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainers';

    protected $fillable = [
        'user_id', 'study_level', 'monthly_value','score'
    ];

    public function costumer()
    {
        return $this->belongsToMany('App\Costumer','customer_trainer','trainer_id','costumer_id');
    }
}
