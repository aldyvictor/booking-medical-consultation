<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;

use App\Models\Doctor;
use App\Models\DoctorCategory;

class DoctorController extends Controller
{
    public function index()
    {
        return view('admin.pages.doctor.index');
    }

    public function create()
    {
        $doctorCategories = DoctorCategory::all();

        return view('admin.pages.doctor.create', compact('doctorCategories'));
    }

    public function store(DoctorRequest $request)
    {
        try {
            $doctor = $request->all();
            $doctor['photo_profile'] = $request->file('photo_profile')->store('img/doctors', 'public');
            Doctor::create($doctor);

            return redirect()->route('doctor.index')->with('success', 'Doctor created successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('doctor.create')->with('error', 'Something went wrong.');
        }
    }

}
