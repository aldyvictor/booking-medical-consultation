<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;

use App\Models\Doctor;
use App\Models\DoctorCategory;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $searchCategory = $request->doctor_category;
        $doctorCategories = DoctorCategory::all();
        $doctors = Doctor::with('doctorCategory')
            ->whereHas('doctorCategory', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->doctor_category . '%');
            })
            ->where(function ($query) use ($request) {
                $query->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('gender', 'like', '%' . $request->search . '%');
            })
            ->get();

        return view('admin.pages.doctor.index', compact(['doctors', 'doctorCategories', 'searchCategory', 'search']));
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
