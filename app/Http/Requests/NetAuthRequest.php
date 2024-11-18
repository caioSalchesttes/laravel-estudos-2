<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class NetAuthRequest extends FormRequest
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
            'token' => 'required|string',
            'dest' => 'nullable|url',
            'hwc_ip' => 'required|ip',
            'hwc_port' => 'required|integer|min:1|max:65535',
        ];
    }

    /**
     * Mensagens de erro personalizadas.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'token.required' => 'O token é obrigatório.',
            'hwc_ip.required' => 'O endereço IP do controlador é obrigatório.',
            'hwc_ip.ip' => 'O endereço IP fornecido não é válido.',
            'hwc_port.required' => 'A porta do controlador é obrigatória.',
            'hwc_port.integer' => 'A porta deve ser um número inteiro.',
            'hwc_port.min' => 'O valor mínimo para a porta é 1.',
            'hwc_port.max' => 'O valor máximo para a porta é 65535.',
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            if (!empty($validator->getMessageBag()->getMessages())) {
                $this->failedValidation($validator);
            }
        });
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->route('alert', [
                'company' => $this->path(),
                'alert' => 'Erro',
                'message' => 'Os dados fornecidos não são válidos.'
            ])
                ->withErrors($validator)
                ->withInput()
        );
    }
}
