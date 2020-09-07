<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'title', 'office_address', 'office_address_2', 'office_suburb', 'office_state', 'office_postcode', 'postal_address', 'postal_address_2', 'postal_suburb', 'postal_state', 'postal_post_code', 'office_telephone', 'office_telephone_2', 'office_facsmile', 'office_email', 'mobile'];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public $incrementing = false;

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
