<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'name', 'office_address', 
                            'office_address_2', 'office_suburb', 
                            'office_state', 'postal_address', 'postal_address_2', 
                            'postal_suburb', 'postal_state', 'office_telephone', 'office_telephone_2', 
                            'office_facsmile', 'office_email', '', 'contact_title', 'contact_first_name', 
                            'contact_last_name', 'contact_mobile', 'contact_telephone', 'contact_facsmile', 
                            'website', 'num_rooms', 'status'];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public $incrementing = false;
    
}
