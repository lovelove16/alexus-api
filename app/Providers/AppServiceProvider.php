<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Hospital;
use App\Probe;
use App\HospitalRoom;
use App\Procedure;
use App\Doctor;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        Hospital::creating(function ($hospital) {
            if (!$hospital->id) {
                $hospital->id = Str::uuid();
            }
        });
        Probe::creating(function ($probe) {
            if (!$probe->id) {
                $probe->id = Str::uuid();
            }
        });
        HospitalRoom::creating(function ($hospitalRoom) {
            if (!$hospitalRoom->id) {
                $hospitalRoom->id = Str::uuid();
            }
        });
        Procedure::creating(function ($procedure) {
            if (!$procedure->id) {
                $procedure->id = Str::uuid();
            }
        });
        Doctor::creating(function ($doctor) {
            if (!$doctor->id) {
                $doctor->id = Str::uuid();
            }
        });
    }
}
