<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class creerProjeRequest extends FormRequest
{

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
                'titre' => 'required|string',
                'type_projet' => 'required|string',
                'forme_juridique' => 'required|string',
                'etat' => 'required|string',
                'plan_affaires' => 'file|mimes:pdf|nullable',

            ];
        }
    }
