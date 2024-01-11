<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    public function testRoute()
    {
        $response = $this->get('/');
        self::assertEquals(200, $response->status());
    }

    public function testFallback()
    {
        $this->get('/404')
            ->assertStatus(200)
            ->assertSeeText('EROR GAN');
    }

    public function testRouteParam()
    {
        $this->get('/prod/1')
            ->assertStatus(200)
            ->assertSeeText('product 1');
    }

    public function testRouteRegex()
    {
        $this->get('/employee/1')
            ->assertStatus(200)
            ->assertSeeText('employee 1');
        $this->get('employee/adit')
            ->assertSeeText('EROR GAN');
    }

    public function testRouteOptional()
    {
        $this->get('/manager/')
            ->assertStatus(200)
            ->assertSeeText('manager 404');
    }

    public function testRouteNamed()
    {
        $this->get('/customers/Abcd01')
            ->assertSeeText('customer/Abcd01');
    }
}
