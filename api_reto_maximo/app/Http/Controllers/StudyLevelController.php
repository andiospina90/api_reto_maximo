<?php

namespace App\Http\Controllers;

//models
use  App\StudyLevel;

//services
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;

class StudyLevelController extends BaseController
{
    public function get()
    {
        $studyLevel = StudyLevel::all();

        return $this->sendResponse($studyLevel->toArray(), 'Study level data');

    }
}
