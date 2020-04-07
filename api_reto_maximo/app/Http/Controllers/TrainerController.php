<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trainer;
use DB;
use Illuminate\Support\Collection;


class TrainerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function trainerCostumers($id)
    {
        // $costumersTrainer = DB::table('users')
        // ->join('costumers', 'users.id', '=', 'costumers.user_id')
        // ->get();

        $costumersTrainer = Trainer::where('user_id',$id)->select('id')->with('costumer.user')->get();

        $newCostumersTrainer = collect();

        foreach ($costumersTrainer as $costumerTrainer) {
            foreach ($costumerTrainer->costumer as $costumer) {
                $newCostumersTrainer->push($costumer->user);
            }
        }



        return $this->sendResponse($newCostumersTrainer, 'data loaded.');
    }
}
