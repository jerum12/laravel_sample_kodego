<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyOwnController extends Controller
{

    // public function __construct(){
    //     $this->middleware('my_middleware');
    // }
    //
    public function itoAyisangFunctionName(Request $request){

        $path = $request->path();
        $method = $request->method();
        $username = $request->input('username');
        $array1 = ['Article','Article2'];
        // echo($path);
        // echo($method);
        // echo($username);
    

        return view('my_own_view',['passVariables' => $path,'arrayValue'=> $array1]);
        //return $respo
    }
}
