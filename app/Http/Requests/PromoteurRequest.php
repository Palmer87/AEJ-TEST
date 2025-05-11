<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromoteurRequest extends FormRequest
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
                    'name' => 'required|max:255|string',
                    'prenom' => 'required|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:6',
                    'date_naissance' => 'required|date',
                    'lieu_naissance' => 'required|max:255',
                    'numero_cni' => 'required|string',
                    'cni_image' => 'required|file|max:2048',
                ];
            }



 }

