<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AniversarianteRequest extends FormRequest
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
            'nome' => 'required|string|min:3',
            'data_nascimento' => [
                'required',
                'date',
                'date_format:d-m-Y',
                'before_or_equal:today', // Não pode ser maior que hoje
                'before_or_equal:' . now()->subYears(18)->format('d-m-Y') // Deve ter no mínimo 18 anos
            ],
            'email' => 'required|email',
            'id_empresa' => 'required|integer|between:1,3',
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',

            'data_nascimento.required' => 'O campo data de nascimento é obrigatório.',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data válida.',
            'data_nascimento.date_format' => 'O campo data de nascimento deve estar no formato dd-mm-aaaa.',
            'data_nascimento.before_or_equal:today' => 'A data de nascimento não pode ser maior que hoje.',
            'data_nascimento.before_or_equal' => 'O usuário deve ter pelo menos 18 anos.',

            'email.email' => 'O campo email deve ser um email válido.',
            'email.required' => 'O campo email é obrigatório.',

            'id_empresa.required' => 'O campo id da empresa é obrigatório.',
            'id_empresa.integer' => 'O campo id da empresa deve ser um número inteiro.',
            'id_empresa.between' => 'O campo id da empresa deve ser um número entre 1 e 3.',];
    }
}
