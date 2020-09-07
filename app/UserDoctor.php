<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDoctor extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'doctor_id', 'status'];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];
}
