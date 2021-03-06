<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Hospital extends JsonResource
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
            'code' => $this->code,
            'name' => $this->name,
            'office_address' => $this->office_address,
            'office_address_2' => $this->office_address_2,
            'office_suburb' => $this->office_suburb,
            'office_state' => $this->office_state,
            'postal_address' => $this->postal_address,
            'postal_address_2' => $this->postal_address_2,
            'postal_suburb' => $this->postal_suburb,
            'postal_state' => $this->postal_state,
            'office_telephone' => $this->office_telephone,
            'office_telephone_2' => $this->office_telephone_2,
            'office_facsmile' => $this->office_facsmile,
            'office_email' => $this->office_email,
            'contact_title' => $this->contact_title,
            'contact_first_name' => $this->contact_first_name,
            'contact_last_name' => $this->contact_last_name,
            'contact_mobile' => $this->contact_mobile,
            'contact_telephone' => $this->contact_telephone,
            'contact_facsmile' => $this->contact_facsmile,
            'website' => $this->website,
            'num_rooms' => $this->num_rooms,
            'status' => $this->status
            
        ];
    }
}
