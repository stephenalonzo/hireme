<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'company_logo' => ['nullable'],
            'company_name' => 'required',
            'company_website' => ['nullable'],
            'company_email' => ['required', 'email', Rule::unique('companies', 'company_email')],
            'company_phone' => 'required',
            'company_address' => 'required',
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ];
    }
}
