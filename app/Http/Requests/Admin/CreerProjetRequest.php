<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreerProjetRequest extends FormRequest
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
            'nom' => 'required|string|max:255',
            'type_projet' => 'required|string|max:255',
            'forme_juridique' => 'required|string|max:255',
            'plan_affaires' => 'required|string|max:255',
            'statut' =>'required|string|max:255',
            'etat' =>'required|string|max:255',

        ];
    }
}
