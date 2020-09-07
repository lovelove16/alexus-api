<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'second_name', 'title', 'date_of_birth', 'address_1', 'address_2', 'suburb', 'state', 'post_code', 'status'];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];
}
