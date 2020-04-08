<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Costumer;
use App\Trainer;
use Validator;

class CostumerController extends BaseController
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
        // try {
            //code...
        
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required|email',


        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();

        $user["name"] = $input['name'];
        $user["last_name"] = $input['lastName'];
        $user["celphone_number"] = $input['phoneNumber'];
        $user["email"] = $input['email'];
        $user["password"] = bcrypt(Str::random(32));
        $user["birth_date"] = $input['birthDate'];
        $user["gender"] = $input['gender'];
        $user["role"] = "C";
        $user["department"] = 1;
        $user["city"] = 1;

        $user = User::create($user);

        $costumerReg['user_id'] = $user->id;
       $costumer = Costumer::create($costumerReg);
        
        $trainer = Trainer::where('user_id',$input['trainerId'])->select('id')->first();

        $costumer->trainer()->attach($costumer->id, ['trainer_id' => $trainer->id ]);

        return $this->sendResponse($trainer, 'User register successfully.');

    // } catch (\Throwable $th) {
    //     return  $this->sendError('register fail', ['error'=>'Hubo un error al momento de ingresar los datos del cliente']);
    // }


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
}
