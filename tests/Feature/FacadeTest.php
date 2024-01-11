<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    public function testConfig()
    {
        $sqlcon1 = config("database.connections.mysql");
        $sqlcon2 = Config::get("database.connections.mysql");

        self::assertEquals($sqlcon1, $sqlcon2);
    }

    public function testEnv()
    {
        $appname1 = env("APP_NAME");
        $appname2 = Env::get("APP_NAME");

        self::assertSame($appname1, $appname2);
    }
}
