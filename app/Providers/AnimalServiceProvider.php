<?php

namespace App\Providers;

use App\Data\Animal;
use App\Data\Tiger;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * menggunakan DeferrableProvider agar dependency dipanggil secara Deffer / lazy
 */
class AnimalServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * menggunakan singleton yang artinya object tersebut akan di buat hanya satu kali
         */
        $this->app->singleton(Animal::class, function () {
            return new Animal;
        });

        /**
         * menggunakan parameter $app untuk mengambil object yang sudah ada di service container
         * mneggunakan bind untuk menentukan cara dalam pembuatan objectnya dan selalu membuat objek baru
         */
        $this->app->bind(Tiger::class, function ($app) {
            return new Tiger($app->make(Animal::class));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function provides()
    {
        return [Animal::class, Tiger::class];
    }
}
