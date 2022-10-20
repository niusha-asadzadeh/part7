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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
////});
Route::get('/index',function (){
    return response()->json([
        'firstname' =>  'niusha',
        'lastname' => 'asadzadeh',
    ]);
});

//get by id
Route::get('/get_by_id/{id}', [\App\Http\Controllers\UserController::class,'getById']);
//get all
Route::get('/get_all',[\App\Http\Controllers\UserController::class ,'getAll']);
//delete by id
Route::delete('/delete/{id}',[\App\Http\Controllers\UserController::class,'delete']);
//add
Route::post('/add',[\App\Http\Controllers\UserController::class,'store']);
//update by id
Route::put('/update/{id}',[\App\Http\Controllers\UserController::class,'update']);







////Route::get('/welcome',[HomeController::class,'index'])->name('hello');
//Route::resource('posts',[\App\Http\Controllers\PostController::class]);
