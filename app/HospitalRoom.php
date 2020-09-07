<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HospitalRoom extends Model
{
    use SoftDeletes;

    protected $fillable = ['hospital_id', 'room_name', 'status'];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public $incrementing = false;
}
