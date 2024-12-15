<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\NetAuthRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PortalController
{
    public function login(NetAuthRequest $request): View
    {
        return view('login', [
            'ssid' => $user_attributes['response']['ssid'] ?? 'Unknown SSID'
        ]);
    }

    public function register(NetAuthRequest $request): View
    {
        return view('register', [
            'ssid' => $user_attributes['response']['ssid'] ?? 'Unknown SSID'
        ]);
    }
}
