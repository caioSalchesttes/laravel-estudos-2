<?php

namespace App\Http\Controllers;

use App\Http\Requests\NetAuthRequest;

class PolicyController
{
    public function index(NetAuthRequest $request)
    {
        return view('policies', [
            'query' => $request->query()
        ]);
    }
}
