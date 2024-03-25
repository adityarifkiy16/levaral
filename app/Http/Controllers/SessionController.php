<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function setSession(Request $request)
    {
        $request->session()->put('User-Id', 'Aditya Rifki');
        $request->session()->put('isMember', true);

        return 'OK';
    }

    public function getSession(Request $request): JsonResponse
    {
        $UID = $request->session()->get('User-Id');
        $member = $request->session()->get('isMember');

        return response()->json([
            'UID' => $UID,
            'isMember' => $member
        ]);
    }
}
