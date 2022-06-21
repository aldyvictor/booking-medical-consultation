<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorCategory;
use App\Models\ScheduleDoctor;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $doctorCategory = DoctorCategory::all();
        $doctor = Doctor::all();
        $scheduleDoctor = ScheduleDoctor::all();
        $customer = User::where('role', 'Customer')->get();
        return view('admin.pages.dashboard', compact('doctorCategory', 'doctor', 'scheduleDoctor', 'customer'));
    }
}
