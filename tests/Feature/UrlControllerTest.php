<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlControllerTest extends TestCase
{
    public function testUrl()
    {
        $this->get('/url/full?name=adit')
            ->assertSeeText('/url/full?name=adit');
    }

    public function testCurrent()
    {
        $this->get('/url/current?name=ganteng')
            ->assertSeeText('http://localhost/url/current');
    }
}
