<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SignalResource extends JsonResource
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
            'pair' => $this->pair,
            'price' => $this->price,
            'duration' => $this->duration,
            'tp' => $this->tp,
            'sl' => $this->sl,
            'move' => $this->move,
            'description' => $this->description,
            'created_at' => $this->created_at->format('F d, Y'),
        ];
    }
}
