<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Procedure extends Model
{
    use SoftDeletes;

    protected $fillable = ['procedure_type', 'description', 'time_required', 'status'];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public $incrementing = false;
}
