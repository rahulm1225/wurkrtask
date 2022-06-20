<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'id' => $this->_id,
            'from_first_name' => $this->from_user_first_name,
            'to_first_name' => $this->to_user_first_name,
            'message_body' => $this->message,
            'is_read' => $this->is_read,
            'message_date' => $this->timestamp,
        ];
    }
}
