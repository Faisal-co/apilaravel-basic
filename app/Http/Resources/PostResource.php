<?php
// Command(php artisan make:resource PostResource)
// instead of Using Post::all() we can use PostResource::collection(Post::all()) to get the data in a specific format defined in PostResource.
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    // public static $wrap = null; // to remove respone data wrap from response accept for post create and post update.
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'title'=> $this->title,
            'body'=> $this->body,
            'created_at'=> $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'=> $this->updated_at->format('Y-m-d H:i:s'),
            /*'author'=> [
                'id'=> $this->author->id,
                'name'=> $this->author->name
            ]*/
            // OR
            'author'=> new UserResource($this->whenLoaded('author'))// block Weather author information sholud loaded or not.
        ];
    }
}
