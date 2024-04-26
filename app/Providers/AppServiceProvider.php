<?php

namespace App\Providers;

use App\Services\Contracts\DependentInterface;
use App\Services\Contracts\NumInterface;
use App\Services\DependentService;
use App\Services\NumService;
use App\Services\NumServiceThree;
use App\Services\NumServiceTwo;
use App\Services\TextService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'TextService',
            function () {
                return new TextService;
            }
        );

        $this->app->bind(
            NumInterface::class,
            function () {
                return new NumService;
            }
        );

        $this->app->singleton(
            NumServiceTwo::class,
            function () {
                return new NumServiceTwo;
            }
        );

        $this->app->scoped(
            NumServiceThree::class,
            function () {
                return new NumServiceThree;
            }
        );

        $this->app->bind(
            DependentInterface::class,
            function (Application $application) {
                return new DependentService(
                    $application->make(NumInterface::class)
                );
            }
        );

//        $this->app->instance(
//
//        )
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
