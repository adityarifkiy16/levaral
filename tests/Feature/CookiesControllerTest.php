<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookiesControllerTest extends TestCase
{
    public function testCookies()
    {
        $this->get('/cookie/set')
            ->assertSeeText('Hello Cookies :)')
            ->assertCookie('User-Id', 'Adit Ganteng')
            ->assertCookie('is-Member', 'true')
            ->assertCookieExpired('User-Id');
    }
}
