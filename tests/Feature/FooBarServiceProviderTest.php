<?php

namespace Tests\Feature;

use App\Data\Animal;
use App\Data\Bar;
use App\Data\Foo;
use App\Data\Tiger;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FooBarServiceProviderTest extends TestCase
{
    public function testServiceProvider()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertSame($foo1, $foo2);

        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);
        self::assertSame($bar1, $bar2);

        /**
         * 
         */
        self::assertSame($foo1, $bar1->foo);
        self::assertSame($foo2, $bar2->foo);
    }

    public function testAnimal()
    {
        $animal1 = $this->app->make(Animal::class);
        $animal2 = $this->app->make(Animal::class);

        self::assertSame($animal1, $animal2);

        $tiger1 = $this->app->make(Tiger::class);
        $tiger2 = $this->app->make(Tiger::class);

        self::assertNotSame($tiger1, $tiger2);

        self::assertSame($tiger1->behavior(), $tiger2->behavior());
    }

    public function testEmpty()
    {
        self::assertTrue(true);
    }
}
