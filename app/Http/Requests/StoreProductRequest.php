<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|max:9999999',
            'priceOld' => 'numeric|max:9999999',
            'saler' => 'required|',
            'image' => 'required|file|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'file' => 'required|file|mimes:pdf|max:2048',
        ];
    }
}
