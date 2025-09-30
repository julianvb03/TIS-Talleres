<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiSupplementFilter extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => 'nullable|string|max:255',
            'order_by' => 'nullable|string|in:name,price',
            'min_price' => 'nullable|integer|min:0',
            'max_price' => 'nullable|integer|min:0',
        ];
    }

    public function prepareForValidation(): void
    {
        $input = $this->all();

        $filteredInput = array_filter($input, function ($value) {
            return $value !== null && $value !== '';
        });

        $this->replace($filteredInput);
    }
}