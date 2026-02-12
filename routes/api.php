<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');// this middleware auth checks Authentication based Cookie then it will work.
// My first Api Route
Route::get('/hello',function(){
    return ["message" => "Hello Laravel My Api"];
});