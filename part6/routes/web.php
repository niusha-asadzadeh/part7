<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

})->name('hello');

Route::resource('/post',PostController::class)->only('create');
//Route::get('/post',function (){
//    return redirect()->route('hello');
//});
