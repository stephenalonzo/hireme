<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantRequest extends FormRequest
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
            'listing_id' => 'required',
            'applicant_name' => 'required',
            'applicant_email' => ['required', 'email'],
            'applicant_phone' => 'required',
            'applicant_address' => 'required',
            'applicant_resume' => 'required'
        ];
    }
}
