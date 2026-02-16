<?php
// Rules and Validatons for CRUD Methods.
namespace App\Http\Controllers\Api\V1;

use App\Models\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // To Get All recordsThis method with 200 status code.
    {   
        // return PostResource::collection(Post::with('author')->get()); // showing all records with author.
        return PostResource::collection(Post::with('author')->paginate(4));// with pagination.
        // OR
        // return Post::all(); 
        // return [[
        //          'id'=> 1,
        //           'title'=> 'tset apply',
        //           'body'=> 'faisal',
        // ]];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request) // To Create record This method with 201 status code.
    {
                $data = $request->validated();
        //     $data = $request->validate([
        //     'title'=>'required|string|min:2',
        //     'body'=>['required','string','min:2']
        // ]);
        $data['author_id'] = 1;
        $post = Post::create($data); 
        // $data = $request->all(); // To take Everything from request.
        // $data = $request->only('title','body'); // only for particular key and value will be output in response.
        // return response()->json($post,201); // it is only for Model post but bettrt with Resource like below.
        return new PostResource($post); // if this PostResource() will be inside response()->json() then not wrapped in data.
        //     [
        //     'id'=> $post->id,
        //     'title'=> $data['title'],
        //     'body'=> $data['body'],
        // ],201)//->setStatusCode(201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) // To Get one recotrd This method with 200 status code.
    {
        //$post = Post::findOrFail($id); OR // Model binding function show(Post $post).
        return new PostResource($post); // With Resource is better.
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
    public function update(Request $request, Post $post) // To Update record This method with 200 status code OR Validation.
    {
        $data = $request->validate([
            'title'=>'required|string|min:2',
            'body'=>['required','string','min:2']
        ]);
        $post->update($data);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) // // This method with 204 status code.
    {
        $post->delete();
        return response()->noContent(); // means with 204 Status Code.
    }
}
