<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyLevel extends Model
{

    protected $table = 'study_level';
    protected $hidden = array('created_at', 'updated_at');
}
