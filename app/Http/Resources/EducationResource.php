<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'category_id' => $this->category_id,
            'category' => $this->category->name,
            'content' => $this->content,
            'photo' => $this->photo(),
            'author' => $this->author,
            'visible' => $this->visible ? true : false,
            'created_at' => $this->created_at->format('F d, Y'),
        ];
    }
}
