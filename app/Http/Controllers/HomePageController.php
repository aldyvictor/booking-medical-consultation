<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

use App\Models\Doctor;
use App\Models\DoctorCategory;
use App\Models\ScheduleDoctor;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home');
    }

    public function showDoctor(Request $request)
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

        return view('frontend.pages.doctor-list', compact(['doctors', 'search', 'searchCategory', 'doctorCategories']));
    }

    public function showSchedule(Request $request, $id)
    {
        $searchDate = $request->date;
        $doctor = Doctor::with('doctorCategory')->where('id', $id)->first();
        $schedules = ScheduleDoctor::with(['doctor', 'doctor.doctorCategory'])
                    ->whereHas('doctor', function ($query) use ($id) {
                        $query->where('id', $id);
                    })
                    ->where(function($query) use ($request) {
                        $query->orWhere('date', 'like', '%' . $request->date . '%');
                    })
                    ->orderBy('date', 'desc')
                    ->paginate(7);

        return view('frontend.pages.schedule-list', compact('schedules', 'doctor'));
    }

    public function createAppointment(Request $request, $id)
    {
        $schedule = ScheduleDoctor::with(['doctor', 'doctor.doctorCategory'])->where('id', $id)->first();

        return view('frontend.pages.appointment', compact('schedule'));
    }

    public function storeAppointment(Request $request)
    {
        try {
            $appointment = Appointment::create([
            'schedule_id' => $request->schedule_id,
            'user_id' => $request->user_id,
            'message' => $request->message
            ]);

            return redirect()->route('home')->with('success', 'Janji Temu Kamu Sukses dibuat');
        } catch (\Throwable $th) {
            return redirect()->route('appointment-create', $request->schedule_id)->with('error', 'Gagal membuat Janji Temu, harap cek data lagi');
        }
    }
}
