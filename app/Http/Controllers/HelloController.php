<?php

namespace App\Http\Controllers;

use App\Data\HelloService;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    protected HelloService $helloService;

    public function __construct(HelloService $helloService)
    {
        $this->helloService = $helloService;
    }

    public function hello($name): string
    {
        return $this->helloService->hello($name);
    }

    public function request(Request $request): string
    {
        return $request->path() . PHP_EOL .
            $request->url() . PHP_EOL .
            $request->fullUrl() . PHP_EOL .
            $request->method() . PHP_EOL .
            $request->header('Accept') . PHP_EOL;
    }
}
