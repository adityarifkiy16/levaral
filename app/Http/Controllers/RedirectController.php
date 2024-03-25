<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    public function hello(string $name): string
    {
        return 'Hello ' . $name;
    }

    public function name(): RedirectResponse
    {
        return redirect()->route('redirect-hello', [
            'name' => 'budi timun'
        ]);
    }
}
