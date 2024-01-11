<?php

namespace App\Data;

class Bar
{
    public Foo $foo;

    /**
     * dependency injector melalu construct
     * foo adalah dependency injector yang artinya class bar membutuhkan foo
     */
    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    public function bar(): string
    {
        return $this->foo->foo() . "and Bar";
    }
}
