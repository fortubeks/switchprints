<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            // Other validation rules...
            'name' => 'required|string|max:255',
            'branch_id' => 'required|exists:branches,id',
            'phone' => [
                'required', // Ensure that the phone is required
                'string',   // Make sure it's a string
                'max:15',   // Set a reasonable max length for a phone number
                Rule::unique('customers') // Ensure uniqueness in the 'customers' table
            ],
        ];
    }

}
