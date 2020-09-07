<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientHospital extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['patient_id', 'hospital_id', 'ur_name', 'status'];
    
    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];
}
