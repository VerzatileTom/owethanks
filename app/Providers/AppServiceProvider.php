<?php

namespace App\Providers;

use Faker\Factory;
use Illuminate\Support\ServiceProvider;
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
        Str::macro('fakeName', function () {
            $faker = Factory::create();

            return $faker->firstName . ' ' . $faker->lastName;
        });
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
