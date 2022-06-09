<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InsightResource extends JsonResource
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
            'coin_id' => $this->coin_id,
            'title' => $this->title,
            'token' => $this->token,
            'photo' => $this->photo(),
            'excerpt' => $this->excerpt,
            'description' => $this->description,
            'featured' => $this->featured ? true : false,
            'created_at' => $this->created_at->format('F d, Y'),
        ];
    }
}
