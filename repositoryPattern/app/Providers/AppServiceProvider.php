<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepository;
use App\Repositories\UserDemoRepository;
use App\Repositories\UserInterface;
use App\Repositories\UserDemoInterface;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, UserRepository::class);      // API Services Binding 
        $this->app->bind(UserDemoInterface::class, UserDemoRepository::class); // Web Route Bind Service
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
