<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'  => 'required|string',
            'email' => 'required|email|unique:users',
            'cpf'   => 'required|numeric|unique:users',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required'  => 'Nome é obrigatório',
            'email.required' => 'Email é obrigatório',
            'email.unique'   => 'Email já cadastrado',
            'cpf.required'   => 'CPF é obrigatório',
            'cpf.numeric'    => 'CPF inválido',
            'cpf.unique'     => 'CPF já cadastrado',
            'email.email'    => 'Email inválido',
            'name.string'    => 'Nome inválido',
        ];
    }
}
