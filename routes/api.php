<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostController as V1PostController;
use App\Http\Controllers\Api\V2\PostController as V2PostController;

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
    return $request->user();
    });

    Route::prefix('v1')->group(function(){
        Route::apiResource('posts', V1PostController::class);

});

});// this middleware auth checks Authentication based Cookie then it will work.
// My first Api Route
/* Route::get('/hello',function(){
     return ["message" => "Hello Laravel My Api"];
 }); */
// Following are Endpoints. here /posts is Resource endpoint name. 
/* Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
// show single record
Route::get('/posts/{id}',[PostController::class, 'show'])->name('posts.show'); */
// OR, here /posts is Resource endpoint name.
// Route::resource('posts', PostController::class);
// OR
// Route::apiResource('posts', PostController::class);
// OR for Versioning.
// Route::prefix('v1')->group(function(){
//     Route::apiResource('posts', V1PostController::class);
// });
// Route::prefix('v2')->group(function(){
//     Route::apiResource('posts', V2PostController::class);
// });

require __DIR__.'/auth.php'; // Our api routes Linked with auth.php routes ???
