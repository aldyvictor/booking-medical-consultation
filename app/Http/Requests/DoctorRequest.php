<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->role == 'Admin') {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'photo_profile' => 'image|max:1000|mimes:png,jpg,jpeg',
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string',
            'doctor_category_id' => 'required|exists:doctor_categories,id'
        ];
    }
}
