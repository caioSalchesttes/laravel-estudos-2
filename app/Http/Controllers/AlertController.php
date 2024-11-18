<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AlertController
{
    public function index(Request $request): View
    {
        if($request->has('company') && $request->has('alert') && $request->has('message')){
            return view('alert',[
                'company' => $request->company,
                'alert' => $request->alert,
                'message' => $request->message,
                'color' => $request->company == 'asav' ? 'wine' : 'purple-blue'
            ]);
        }


        return view('alert',[
            'company' => 'unisinos',
            'alert' => 'Sucesso',
            'message' => 'This is a test alert message.'
        ]);
    }
}