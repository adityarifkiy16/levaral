<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncryptTest extends TestCase
{
    public function testEncrypt()
    {
        $encrypt = Crypt::encrypt('Adit Ganteng');
        $decrypt = Crypt::decrypt($encrypt);
        var_dump($decrypt);

        self::assertEquals('Adit Ganteng', $decrypt);
    }
}
