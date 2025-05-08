<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GestionnaireRequest extends FormRequest
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
            'poste' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' =>'required|string|min:8',
        ];
    }
}
