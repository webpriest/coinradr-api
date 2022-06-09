<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'caption' => $this->caption,
            'slug' => $this->slug,
            'author' => $this->author,
            'content' => $this->content,
            'photo' => $this->photo(),
            'published' => $this->published ? true : false,
            'created_at' => $this->created_at,
            'created_at_readable' => $this->created_at->diffForHumans(),
        ];
    }
}
