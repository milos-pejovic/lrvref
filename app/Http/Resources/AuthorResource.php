<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Auth;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'first_name' => $this->first_name,
          'last_name' => $this->last_name,
          'about' => $this->about,
          'books' => BookResource::collection($this->books),
//          'secret' => $this->when(Auth::user()->isAdmin(), 'secret-value'),
          'secret' => $this->when($this->id % 2 == 0, 'secret-value'),
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
