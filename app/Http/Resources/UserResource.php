<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'id'=> $this->user->id, // by default it points user so no need to write. 
            'id'=> $this->id, 
            'name'=> $this->name,
            'email'=>$this->email
        ];
    }
}
