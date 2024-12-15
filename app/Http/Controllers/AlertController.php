<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AlertController
{
    public function success(Request $request): View
    {
        return view('success', [
            'alert'   => $request->alert,
            'message' => $request->message,
        ]);
    }

    public function fail(Request $request): View
    {
        return view('fail', [
            'alert'   => $request->alert,
            'message' => $request->message,
        ]);
    }
}
