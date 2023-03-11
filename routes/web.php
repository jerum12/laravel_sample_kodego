<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyOwnController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/testing', function () {
    return view('testing');
});

Route::get('users/{id}', function ($id) {
    return "User ID : " . $id;
});



Route::get('users/{id?}', function ($id = '1234') {
    return "User ID : " . $id;
});


Route::get('testMiddleware', function (){
    return 123;
})->middleware('my_middleware');

Route::get('myOwnRoute', [MyOwnController::class, 'itoAyisangFunctionName'])->middleware('my_middleware');

Route::get('/insertData',function (){
    //DB::insert('insert into articles (title, author, description) values (?, ?, ?)', ['Title 1', 'Dayle', 'Description 1']);
    //DB::update('update articles set title = ? where id = ?', ['Updated Title 1',1]);
    return DB::select('select * from articles ', []);
});

Route::get('/eloquent',[ArticlesController::class, 'index']);

Route::get('eloquent/{id}',[ArticlesController::class, 'show']);

//  Route::get('myOwnRoute',[
//      'middleware' => 'my_middleware',
//      'uses' => MyOwnController::class, 'itoAyisangFunctionName'
//  ]);