<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookiesController extends Controller
{
    public function setCookies(): Response
    {
        /**
         * cookie('key','val','timeout','path')
         */
        return response('Hello Cookies :)')
            ->cookie('User-Id', 'Adit Ganteng', 1, '/')
            ->cookie('is-Member', "true", 1, '/');
    }

    public function getCookies(Request $request): JsonResponse
    {
        return response()
            ->json([
                'User-Id' => $request->cookie('User-Id', 'guest'),
                'is-Member' => $request->cookie('is-Member', 'false')
            ]);
    }

    public function clearCookies(Request $request): Response
    {
        return response('Clear Cookies')
            ->withoutCookie('User-Id')
            ->withoutCookie('is-Member');
    }
}
