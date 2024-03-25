<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponse()
    {
        $this->get('/response')->assertStatus(200)->assertExactJson([
            'firstname' => 'Aditya',
            'lastname' => 'Rifki'
        ]);
    }
}
