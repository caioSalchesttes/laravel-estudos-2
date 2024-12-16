<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\NetAuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthController
{
    public function login(LoginRequest $request)
    {
        $findUser = User::where('cpf', $request->cpf)->first();

        if(!$findUser){
            return redirect()->route('portal.register', $request->query())->withErrors([
                'user' => 'Usuário não encontrado, por favor, realize o cadastro'
            ]);
        }

        Visitor::create([
            'user_id' => $findUser->id,
            'payload' => $request->query()
        ]);

        return view('continue', [
            'query' => $request->query()
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->all());

        if(!$user){
            return redirect()->route('portal.register', $request->query())->withErrors([
                'user' => 'Erro ao cadastrar usuário, tente novamente'
            ]);
        }

        Visitor::create([
            'user_id' => $user->id,
            'payload' => $request->query()
        ]);

        return view('continue', [
            'query' => $request->query()
        ]);
    }
}
