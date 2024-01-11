<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Data\Person;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PhpParser\Node\Expr\New_;

class ServiceContainerTest extends TestCase
{
    public function testBind()
    {
        $this->app->bind(Person::class, function ($app) {
            return new Person('aditya', 'ganteng');
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertNotSame($person1, $person2);
    }

    public function testSingleton()
    {
        /* membuat object baru dengan menggunakan object yang sudah ada */
        $this->app->singleton(Person::class, function ($app) {
            return new Person('aditya', 'ganteng');
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertSame($person1, $person2);
    }

    public function testInstance()
    {
        /* membuat object baru dengan menggunakan object yang sudah ada */
        $person = new Person('adit', 'ganteng');
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('adit', $person1->firstname);
        self::assertEquals('adit', $person2->firstname);
        self::assertSame($person, $person1);
        self::assertSame($person1, $person2);
    }
}
