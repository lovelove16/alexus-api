<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Probe extends Model
{
    protected $fillable = ['reference', 'active'];

    protected $hidden = ['created_at', 'updated_at'];

    public $incrementing = false;
}
