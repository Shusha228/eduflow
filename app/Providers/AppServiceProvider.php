<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Repositories\CourseRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider{

    public function register() : void{
        $this->app->bind(
            CourseRepositoryInterface::class,
            CourseRepository::class
        );
    }
}
