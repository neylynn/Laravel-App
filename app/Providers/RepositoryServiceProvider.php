<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\PatientRepository;
use App\Interfaces\PatientRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
    }
}
