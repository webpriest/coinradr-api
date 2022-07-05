<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotiResource extends JsonResource
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
            'token' => $this->token,
            'subject' => $this->subject,
            'content' => $this->content,
            'visible' => $this->visible ? true : false,
            'created_at' => $this->created_at->format('F d, Y'),
            'createdtime_at' => $this->created_at->format('F d, Y h:i A')
        ];
    }
}
