<?php

namespace App\Providers;

use App\Hashing\Argon2iHasher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;

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
        Hash::extend('argon2i', static function () {
            return new Argon2iHasher();
        });
    }
}
