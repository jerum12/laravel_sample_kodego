<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PassportAuthController extends Controller
{
    //
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
           'name'   => 'required|string',
           'email' => 'required|string|email',
           'password' => 'required|string',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors()->all()],422);
        }

        $password_hash = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password_hash
        ]);

        $token = $user->createToken('Laravel Token Password')->accessToken;
        $reponse = ['token' => $token];

        return response($reponse,200);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
           'email' => 'required|string|email',
           'password' => 'required|string',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors()->all()],422);
        }

        $user = User::where('email', $request->email)->first();

        if($user){
         
            if(Hash::check($request->password, $user->password)){
                $token =  $user->createToken('Laravel Token Password')->accessToken;
                $reponse = ['token' => $token,'message' => 'Successfully logged in!'];

                return response($reponse,200);
            }else{
                $response =['message' => 'Password is incorrect!'];
                return response($response,422);
            }
        }else{
            $response =['message' => 'User does not exist'];
            return response($response,422);
        }
    }

    public function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        $response =['message' => 'You have been successfully logged out!'];
        return response($response,200);
    }
}
