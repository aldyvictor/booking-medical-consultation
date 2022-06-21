<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ScheduleDoctorRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'date' => 'required|date|date_format:Y-m-d|after:today',
            'start_time' => 'nullable|date_format:H:i|unique:schedule_doctors,start_time,null,id,doctor_id,' . $request->doctor_id . ',date,' . $request->date,
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'doctor_id' => 'required|exists:doctors,id',
        ];
    }
}
