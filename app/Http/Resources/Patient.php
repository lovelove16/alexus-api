<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Patient extends JsonResource
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
            'ID' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'second_name' =>$this->second_name,
            'title' => $this->title,
            'date_of_birth' => $this->date_of_birth,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'suburb' => $this->suburb,
            'state' => $this->state,
            'post_code' => $this->post_code,
            'status' => $this->status
        ];
    }
}
