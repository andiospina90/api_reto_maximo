<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::get('/user','UserController@index');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', 'RegisterController@register');
Route::post('login', 'RegisterController@login');
Route::get('studyLevel','StudyLevelController@get');


Route::middleware('auth:api')->group( function () {

    Route::post('costumer', 'CostumerController@store');
    
    
    Route::get('trainer/{id}/costumers','TrainerController@trainerCostumers');

});