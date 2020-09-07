<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Procedure extends JsonResource
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
            'procedure_type' => $this->procedure_type,
            'description' => $this->description,
            'time_required' => $this->time_required,
            'status' => $this->status
        ];
    }
}
