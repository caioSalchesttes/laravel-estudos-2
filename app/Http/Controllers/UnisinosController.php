<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\NetAuthRequest;
use Illuminate\Support\Facades\Log;

class UnisinosController extends NetAuthController
{
    public function index(NetAuthRequest $request)
    {
//        http://localhost/unisinos?hwc_ip=192.168.0.1&hwc_port=2222&token=3213213

        $mu_ip_addr      = $request->ip();
        $user_attributes = $this->getUserAttributes($request->hwc_ip, $request->hwc_port, $mu_ip_addr, $request->token);

        return view('unisinos', [
            'ewc_ip'   => $request->hwc_ip,
            'ewc_port' => $request->hwc_port,
            'token'    => $request->token,
            'dest'     => $request->dest,
            'ssid'     => $user_attributes['response']['ssid'] ?? 'Unknown SSID'
        ]);
    }

    public function store(LoginRequest $request)
    {
        Log::info('ASAV login request', $request->all());

        $this->getLogin($request->hwc_ip, $request->hwc_port, $request->ip(), $request->token);

        return redirect()->route('alert', [
            'company' => 'asav',
            'alert' => 'Sucesso',
            'message' => 'Login efetuado com sucesso!'
        ]);
    }
}