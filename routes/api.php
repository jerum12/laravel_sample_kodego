<?php

use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\APIControllerSample;
use App\Http\Controllers\SampleApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/testing', function () {
//     return '123';
// });

//Route::apiResource('/testingApi', APIControllerSample::class);


//Route::apiResource('/sample', SampleApiController::class);

// Route::get('/sample', [SampleApiController::class,'index']);
// Route::get('/sample/{id}', [SampleApiController::class,'show']);
// Route::post('/sample', [SampleApiController::class,'store']);
// Route::put('/sample/{id}', [SampleApiController::class,'update']);
// Route::delete('/sample/{id}', [SampleApiController::class,'destroy']);

Route::group(['middleware' =>['cors_accept','json_response']], function(){

    Route::post('/register', [PassportAuthController::class,'register']);
    Route::post('/login', [PassportAuthController::class,'login']);
});

Route::middleware('auth:api')->group(function (){


    Route::get('/sample', [SampleApiController::class,'index']);
    Route::get('/sample/{id}', [SampleApiController::class,'show']);
    Route::post('/sample', [SampleApiController::class,'store']);
    Route::put('/sample/{id}', [SampleApiController::class,'update']);
    Route::delete('/sample/{id}', [SampleApiController::class,'destroy']);

    Route::post('/logout', [PassportAuthController::class,'logout']);
});