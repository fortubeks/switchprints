<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
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
            'customer_id' => 'nullable|exists:customers,id',
            'name' => $this->customer_id ? 'nullable' : 'required|string|max:255',
            'style_id.*' => 'required|exists:styles,id',
            'machine_id.*' => 'required|exists:machines,id',
            'amount.*' => 'required|numeric',
            'order_date' => 'required|date',
            'phone' => [
                'sometimes',
                'required_without_all:guest_id',
                'nullable',
                Rule::unique('customers')
                    ->whereNotNull('phone')
                    ->ignore($this->customer_id, 'id'), // Ignore validation if guest_id is present
            ],
        ];
    }

}
