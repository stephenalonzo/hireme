<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
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
            'job_title' => 'required',
            'job_category' => 'required',
            'opening_date' => ['required', 'date'],
            'closing_date' => ['required', 'date'],
            'location' => 'required',
            'hourly_wage' => 'required',
            'payment_frequency' => 'required',
            'job_type' => 'required',
            'work_hours' => ['required'],
            'work_days' => 'required',
            'qualifications' => 'required',
            'job_description' => 'required'
        ];
    }
}
