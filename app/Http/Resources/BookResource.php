<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
          'title' => $this->title,
          'about' => $this->about,
          'author_id' => $this->author_id,
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
