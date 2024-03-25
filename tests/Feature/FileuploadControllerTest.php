<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FileuploadControllerTest extends TestCase
{
    public function testUpload()
    {
        $image = UploadedFile::fake()->image('adit.png');
        $this->post('/file/upload', [
            'picture' => $image
        ])->assertSeeText('OK : adit.png');
    }
}
