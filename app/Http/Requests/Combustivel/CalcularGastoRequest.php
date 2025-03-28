<?php

namespace App\Http\Requests\Combustivel;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Combustivel;

class CalcularGastoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'combustivel' => 'required|integer|in:' . implode(',', Combustivel::tiposCombustivel()),
            'valor' => 'required|numeric|min:0.1',
            'gasto' => 'required|numeric|min:0.1',
            'distancia' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'combustivel.required' => 'O tipo de combustível é obrigatório.',
            'combustivel.integer' => 'O tipo de combustível deve ser um número inteiro.',
            'combustivel.in' => 'O tipo de combustível informado não é válido.',

            'valor.required' => 'O valor do combustível é obrigatório.',
            'valor.numeric' => 'O valor do combustível deve ser um número.',
            'valor.min' => 'O valor do combustível deve ser maior que 0.',

            'gasto.required' => 'O consumo de combustível é obrigatório.',
            'gasto.numeric' => 'O consumo de combustível deve ser um número.',
            'gasto.min' => 'O consumo de combustível deve ser maior que 0.',

            'distancia.required' => 'A distância percorrida é obrigatória.',
            'distancia.integer' => 'A distância percorrida deve ser um número inteiro.',
            'distancia.min' => 'A distância percorrida deve ser maior que 0.',
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException($validator, response()->json($validator->errors(), 422));
    }
}
