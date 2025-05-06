<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromoteurRrequest extends FormRequest
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
        'prenoms' => 'required',
        'email' => 'required|email|unique:users,email|lowercase',
        'password' => 'required|min:6|alpha_num|confirmed',
        'date_naissance' => 'required',
        'lieu_naissance' => 'required',
        'numero_cni' => 'required',
        'cni_image' => 'required|image',
        ];


    }
}
