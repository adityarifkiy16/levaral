<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput()
    {
        $this->withoutMiddleware();

        $this->get('/input/hello?name=Adit')
            ->assertSeeText('Hello Adit');

        $this->post('/input/hello', ['name' => 'Adit'])
            ->assertSeeText('Hello Adit');

        $this->post('/input/hello/first', [
            'name' => [
                'first' => 'Aditya',
                'last' => 'Rifki'
            ],
            'job' => [
                'role' => 'IT SUPPORT',
                'position' => 'STAFF'
            ]
        ])->assertSeeText("Hello Aditya Rifki, you are STAFF IT SUPPORT");
    }

    public function testArray()
    {
        $this->post('/input/helloarray', [
            'products' => [
                [
                    'name' => 'ASUS'
                ],
                [
                    'name' => 'LENOVO'
                ],
            ]
        ])->assertExactJson(['ASUS', 'LENOVO']);
    }
}
