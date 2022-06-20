<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorCategoryRequest;
use App\Models\DoctorCategory;
use Illuminate\Http\Request;

class DoctorCategoryController extends Controller
{
    public function index()
    {
        $doctorCategories = DoctorCategory::all();

        return view('admin.pages.doctor-category.index', compact('doctorCategories'));
    }

    public function create()
    {
        return view('admin.pages.doctor-category.create');
    }

    public function store(Request $request)
    {
        try {
            $doctorCategory = DoctorCategory::create([
                'name' => $request->name,
            ]);

            return redirect()->route('doctor-category.index')->with('success', 'Doctor Category created successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('doctor-category.create')->with('error', 'Something went wrong.');
        }
    }

    public function edit(Request $request, $id)
    {
        $doctorCategory = DoctorCategory::find($id);

        return view('admin.pages.doctor-category.edit', compact('doctorCategory'));
    }

    public function update(DoctorCategoryRequest $request, $id)
    {
        try {
            $doctorCategory = DoctorCategory::find($id);
            $doctorCategory->name = $request->name;
            $doctorCategory->save();

            return redirect()->route('doctor-category.index')->with('success', 'Doctor Category updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('doctor-category.edit')->with('error', 'Something went wrong.');
        }
    }

    public function delete(Request $request)
    {
        try {
            $doctorCategory = DoctorCategory::find($request->id);
            $doctorCategory->delete();

            return redirect()->route('doctor-category.index')->with('success', 'Doctor Category deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('doctor-category.index')->with('error', 'Something went wrong.');
        }
    }
}
