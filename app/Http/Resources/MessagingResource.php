<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessagingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
          'id' => $this->id,
          'message'=>$this->message,
          'send_to'=>$this->send_to,
          'send_date' => date('d/m/Y g:i A',strtotime($this->created_at))
        ];
    }
}
