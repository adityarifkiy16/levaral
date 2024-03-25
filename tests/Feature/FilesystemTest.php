<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FilesystemTest extends TestCase
{
    public function testStorage()
    {
        // digunakan untuk mendapatkan storage
        $filesystem = Storage::disk('local');
        // kemudian dibuatlah filenya sesuai dengan config filesystem
        $filesystem->put('helloworld.txt', 'Saya ganteng');
        self::assertEquals('Saya ganteng', $filesystem->get('helloworld.txt'));
    }

    public function testPublic()
    {
        $filesystem = Storage::disk('public');
        $filesystem->put('file.txt', 'helo ganteng');
        self::assertEquals('helo ganteng', $filesystem->get('file.txt'));
    }
}
