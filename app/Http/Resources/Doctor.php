<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Doctor extends JsonResource
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
            'title' =>$this->title,
            'office_address' => $this->office_address,
            'office_address_2' => $this->office_address_2,
            'office_suburb' => $this->office_suburb,
            'office_state' => $this->office_state,
            'office_postcode' => $this->office_postcode,
            'postal_address' => $this->postal_address,
            'postal_address_2' => $this->postal_address_2,
            'postal_suburb' => $this->postal_suburb,
            'postal_state' => $this->postal_state,
            'postal_post_code' => $this->postal_post_code,
            'office_telephone' => $this->office_telephone,
            'office_telephone_2' => $this->office_telephone_2,
            'office_facsmile' => $this->office_facsmile,
            'office_email' => $this->office_email,
            'mobile' => $this->mobile
        ];
    }
}
