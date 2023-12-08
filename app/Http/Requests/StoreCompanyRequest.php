<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
            'website_link' => 'required|url|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'logo.required' => 'The logo field is required.',
            'logo.image' => 'The logo field must be an image.',
            'logo.mimes' => 'The logo field must be a file of type: jpeg, png, jpg, gif, svg.',
            'logo.max' => 'The logo field must not be larger than 2048 kilobytes.',
            'logo.dimensions' => 'The logo field must have a minimum width and height of 100 pixels.',
        ];
    }

}
