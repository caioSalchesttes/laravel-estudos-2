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
