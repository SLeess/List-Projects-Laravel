<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionsRequest extends FormRequest
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
            'questions' =>[
                'required',
                'integer',
                'min:3',
                'max:30'
            ],
        ];
    }

    public function messages()
    {
        return [
            'questions.required' => 'É obrigatório informar a quantidade de perguntas.',
            'questions.integer' => 'O campo deve ser um valor numérico inteiro.',
            'questions.min' => 'A quantidade de perguntas não pode ser menor que :min.',
            'questions.max' => 'A quantidade de perguntas não pode ser maior que :max.',
        ];
    }
}
