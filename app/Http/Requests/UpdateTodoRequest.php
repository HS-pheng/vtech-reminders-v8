<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoRequest extends FormRequest
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
            "todo" => ['string', 'sometimes', 'required',Rule::unique('todos')->ignore($this->route()->todo->id),
        ],
            "isCompleted" => ['boolean', 'sometimes', 'required']
        ];
    }

    public function messages()
    {
        return ["todo.unique" => "The todo is duplicated"];
    }
}
