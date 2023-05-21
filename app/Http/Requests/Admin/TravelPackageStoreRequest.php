<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TravelPackageStoreRequest extends FormRequest
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
            'title' => 'string|required|max:255',
            'location' => 'string|required|max:255',
            'about' => 'string|required',
            'featured_event' => 'string|required|max:255',
            'language' => 'string|required|max:255',
            'foods' => 'string|required|max:255',
            'departured_date' => 'date|required',
            'duration' => 'string|required|max:255',
            'type' => 'string|required|max:255',
            'price' => 'integer|required'
        ];
    }
}
