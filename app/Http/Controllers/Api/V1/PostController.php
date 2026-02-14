<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // This method with 200 status code.
    {   
        // return [[
        //          'id'=> 1,
        //           'title'=> 'tset apply',
        //           'body'=> 'faisal',
        // ]];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // This method with 201 status code.
    {
            $data = $request->validate([
            'title'=>'required|string|min:2',
            'body'=>['required','string','min:2']
        ]);
        $data['author_id'] = 2;
        $post = Post::create($data);
        // $data = $request->all(); // To take Everything from request.
        // $data = $request->only('title','body'); // only for particular key and value will be output in response.
        return response()->json($post,201);
        //     [
        //     'id'=> $post->id,
        //     'title'=> $data['title'],
        //     'body'=> $data['body'],
        // ],201)//->setStatusCode(201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) // This method with 200 status code.
    {
        // return response()->json([
        // 'message'=>'abc',    
        // 'data'=>[
        //     'id'=> 1,
        //     'title'=> 'tset',
        //     'body'=> 'Post body'
        // ]])
        // ->header('test','faisal')
        // ->header('test2','siraj');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) // This method with 200 status code OR Validation.
    {
        $data = $request->validate([
            'title'=>'required|string|min:2',
            'body'=>['required','string','min:2']
        ]);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) // // This method with 204 status code.
    {
        return response()->noContent(); // means with 204 Status Code.
    }
}
