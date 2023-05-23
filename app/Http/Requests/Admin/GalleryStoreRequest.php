<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GalleryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->roles == 'ADMIN';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'travel_packages_id' => 'integer|required|exists:travel_packages,id',
            'image' => 'required'
        ];
    }

    // Custom Message Validation Request
    public function messages()
    {
        return [
            'travel_packages_id.required' => 'Please select a Travel Package for this image!',
            'image.required'  => 'Please wait until image is uploaded!',
        ];
    }
}
