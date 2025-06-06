<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Enrollment;
use App\Observers\EnrollmentObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider{

    protected $listen = [];

    public function boot() : void{
        Enrollment::observe(EnrollmentObserver::class);
    }
}
