<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'id' => $this->id,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name, 
            'email' => $this->email,
            'password' => $this->password,
            'office_telephone' => $this->office_telephone, 
            'mobile_number' => $this->mobile_number,
            'permission' => $this->permission
        ];
    }
}
