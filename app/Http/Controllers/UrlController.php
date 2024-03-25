<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function UrlFull()
    {
        return url()->full();
    }
    public function UrlCurrent()
    {
        return url()->current();
    }
}
