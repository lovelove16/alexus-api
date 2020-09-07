<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HospitalRoom extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID' => $this->id,
            'hospital_id' => $this->hospital_id,
            'room_name' => $this->room_name,
            'status'=> $this->status
        ];
    }
}
