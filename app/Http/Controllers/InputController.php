<?php

namespace App\Http\Controllers;

use App\Data\HelloService;
use Illuminate\Http\Request;

class InputController extends Controller
{
    private HelloService $helloService;

    public function __construct(HelloService $helloService)
    {
        $this->helloService = $helloService;
    }
    public function hello(Request $request): string
    {
        $name = $request->input('name');
        return $this->helloService->hello($name);
    }

    public function first(Request $request): string
    {
        $firstname = $request->input('name.first');
        $lastname = $request->input('name.last');
        $role = $request->input('job.role');
        $position = $request->input('job.position');

        return "Hello $firstname $lastname, you are $position $role";
    }

    public function helloInput(Request $request): string
    {
        $input = $request->input();
        return json_encode($input);
    }

    public function helloArray(Request $request): string
    {
        $names = $request->input('products.*.name');
        return json_encode($names);
    }
}
