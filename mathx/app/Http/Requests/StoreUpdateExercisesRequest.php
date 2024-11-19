<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateExercisesRequest extends FormRequest
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
        $rules = [
            "sum" => "required_without_all:subtraction,multiplication,division|",
            "subtraction" => "required_without_all:sum,multiplication,division|",
            "multiplication" => "required_without_all:sum,subtraction,division|",
            "division" => "required_without_all:sum,subtraction,division|",
            "minimum" => "required|integer|lte:maximum|min:0|max:999",
            "maximum" => "required|integer|min:0|max:999",
            "exercises" => "required|integer|min:5|max:50"
        ];
        return $rules;
    }

    public function messages(): array
    {
        return [
            "exercises.required" => "É obrigatório informar a quantidade de exercícios",
            "minimum.required" => "É obrigatório informar o valor mínimo",
            "maximum.required" => "É obrigatório informar o valor Máximo",
        ];
    }
}
