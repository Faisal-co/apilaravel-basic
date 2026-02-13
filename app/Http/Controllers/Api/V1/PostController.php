<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        return [1,2,3];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all(); // To take Everything from request.
        return $data;
        // return response()->json([
        //     'id'=> 1,
        //     'title'=> 'tset apply',
        //     'body'=> 'Post body',
        // ],201)//->setStatusCode(201)
        // ;
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
        'message'=>'abc',    
        'data'=>[
            'id'=> 1,
            'title'=> 'tset',
            'body'=> 'Post body'
        ]])
        ->header('test','faisal')
        ->header('test2','siraj');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
