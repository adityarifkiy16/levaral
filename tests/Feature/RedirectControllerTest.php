<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    public function testRedirect()
    {
        $subject = urlencode('budi timun');
        $url = str_replace('+', '%20', $subject);
        $this->get('/redirect/name')
            ->assertStatus(302)
            ->assertRedirect('/redirect/hello/' . $url);
    }
}
