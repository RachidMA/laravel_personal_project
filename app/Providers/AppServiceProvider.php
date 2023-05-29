<?php

namespace App\Providers;

use App\Repository\IJobRepository;
use App\Repository\JobRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Bind and register     IJobRepository wit JobRepository
        $this->app->bind(IJobRepository::class, JobRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
