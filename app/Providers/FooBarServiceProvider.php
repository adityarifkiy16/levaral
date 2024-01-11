<?php

namespace App\Providers;

use App\Data\Bar;
use App\Data\Foo;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * DeferrableProvider tidak akan dipanggil kecuali dibutuhkan atau bersifat lazy
 * berfungsi untuk meningkatkan performa aplikasi karena dependency tidak akan diload kecuali dibutuhkan
 */
class FooBarServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // echo "FooBarServiceProvider";
        $this->app->singleton(Foo::class, function () {
            return new Foo();
        });

        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class));
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
        return [Foo::class, Bar::class];
    }
}
