<?php

namespace Tests\Feature;

use App\Data\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{
    public function testHello()
    {
        $this->get('/controller/hello/adit')
            ->assertSeeText('Hello adit');
    }

    public function testDependencies()
    {
        $helloservice1 = $this->app->make(HelloService::class);
        $helloservice2 = $this->app->make(HelloService::class);
        self::assertSame($helloservice1, $helloservice2);
    }

    public function testRequest()
    {
        $this->get('/controller/request', [
            'Accept' => 'plain/text'
        ])->assertSeeText('controller/request')
            ->assertSeeText('http://localhost/controller/request')
            ->assertSeeText('GET')
            ->assertSeeText('plain/text');
    }
}
