<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileuploadController extends Controller
{
    public function upload(Request $request)
    {
        $picture = $request->file('picture');
        $upload = $picture->storePubliclyAs('pictures', $picture->getClientOriginalName(), 'public');
        if ($upload) {
            return 'OK : ' . $picture->getClientOriginalName();
        } else {
            return 'ERROR';
        }
    }
}
