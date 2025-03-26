<?php

namespace App\Http\Requests\Sono;

use Illuminate\Foundation\Http\FormRequest;

class VerificarSonoRequest extends FormRequest
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
    public function rules()
    {
        return [
            'horas' => 'required|integer|min:1',
            'dataNascimento' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'horas.required' => 'A altura é obrigatória.',
            'horas.integer' => 'A altura deve ser um número inteiro.',
            'horas.min' => 'A altura deve ser maior que 0.',

            'dataNascimento.required' => 'A dataNascimento é obrigatória.',
            'dataNascimento.integer' => 'A dataNascimento deve ser uma data.',
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException($validator, response()->json($validator->errors(), 422));
    }
}
