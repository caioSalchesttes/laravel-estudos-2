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
            'url'                => 'required|string|max:255',
            'ssid'               => 'required|string|max:50',
            'mac'                => 'required|string|max:50|regex:/^[0-9a-fA-F]{12}$/',
            'autherr'            => 'nullable|integer|min:0',
            'challenge'          => 'nullable|string|max:255',
            'Called-Station-Id'  => 'nullable|string|max:50',
            'NAS-IP-Address'     => 'nullable|ip',
            'RADIUS-NASIP'       => 'nullable|ip',
            'Calling-Station-Id' => 'nullable|string|max:50',
            'STA-IP'             => 'nullable|ip',
            'NAS-ID'             => 'nullable|string|max:255',
            'MGT-MAC-Address'    => 'nullable|string|regex:/^[0-9a-fA-F]{12}$/',
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
            redirect()->route('alert.fail', [
                'alert'   => 'Ops!',
                'message' => 'Os dados fornecidos não são válidos.'
            ])
        );
    }
}
