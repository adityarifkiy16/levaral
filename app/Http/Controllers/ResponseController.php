<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseController extends Controller
{
    public function response(): Response
    {
        $body = [
            'firstname' => 'Aditya',
            'lastname' => 'Rifki'
        ];

        return response(json_encode($body), 200)->header('Content-Type', 'application/json')->withHeaders([
            'Author' => 'Aditya Rifki',
            'App' => 'belajar laravel'
        ]);
    }

    public function download(): BinaryFileResponse
    {
        $file = Storage::disk('public')->path('file.txt');
        return response()->download($file, 'file.txt');
    }

    public function responseFile(): BinaryFileResponse
    {
        $file = Storage::disk('public')->path('/pictures/Screenshot 2024-01-02 183354.png');
        return response()->file($file);
    }
}
