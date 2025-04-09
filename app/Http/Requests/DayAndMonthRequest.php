<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DayAndMonthRequest extends FormRequest
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
                'dia' => 'nullable|numeric|min:1|max:31',  // Valida se é um número entre 1 e 31
                'mes' => 'nullable|numeric|min:1|max:12',  // Valida se é um número entre 1 e 12
            ];

    }
    public function messages()
    {
        return [
            'dia.integer' => 'O campo dia deve ser um número inteiro.',
            'dia.min' => 'O campo dia deve ser um número entre 1 e 31.',
            'dia.max' => 'O campo dia deve ser um número entre 1 e 31.',

            'mes.integer' => 'O campo mes deve ser um número inteiro.',
            'mes.min' => 'O campo mes deve ser um número entre 1 e 12.',
            'mes.max' => 'O campo mes deve ser um número entre 1 e 12.',
        ];
    }
}
