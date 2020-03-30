<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

   

class RegisterController extends BaseController

{

    /**

     * Register api

     *

     * @return \Illuminate\Http\Response

     */

    public function register(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'name' => 'required',

            'email' => 'required|email',

            'password' => 'required',


        ]);

   

        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors());       
   
        }

   

        $input = $request->all();

        
        $user["name"] = $input['name'];
        $user["last_name"] = $input['lastName'];
        $user["celphone_number"] = $input['phoneNumber'];
        $user["email"] = $input['email'];
        $user["password"] = bcrypt($input['password']);
        $user["birth_date"] = $input['birthDate'];
        $user["gender"] = $input['gender'];
        $user["role"] = "T";
        $user["department"] = 1;
        $user["city"] = 1;
        

        $user = User::create($user);

        //$success['token'] =  $user->createToken('retoMaximo')->accessToken;

        $success['name'] =  $user->name;

   

        return $this->sendResponse($success, 'User register successfully.');

    }

   

    /**

     * Login api

     *

     * @return \Illuminate\Http\Response

     */

    public function login(Request $request)

    {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 

            $user = Auth::user(); 

            $success['token'] =  $user->createToken('MyApp')-> accessToken; 

            $success['name'] =  $user->name;

   

            return $this->sendResponse($success, 'User login successfully.');

        } 

        else{ 

            return $this->sendError('Los datos ingresados no son los correctos.', ['error'=>'Los datos ingresados no son los correctos']);

        } 

    }

}