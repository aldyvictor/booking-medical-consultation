<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleDoctorRequest;

use App\Models\Doctor;
use App\Models\ScheduleDoctor;
use App\Models\DoctorCategory;

class ScheduleDoctorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $searchCategory = $request->doctor_category;
        $searchDate = $request->date;
        $doctorCategories = DoctorCategory::all();
        $schedules = ScheduleDoctor::with(['doctor', 'doctor.doctorCategory'])
                    ->whereHas('doctor.doctorCategory', function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->doctor_category . '%');
                    })
                    ->where(function($subQuery) use ($request) {
                        $subQuery->whereHas('doctor', function($query) use ($request) {
                            $query->where('name', 'like', '%' . $request->search . '%');
                        });
                    })
                    ->where(function($query) use ($request) {
                        $query->orWhere('date', 'like', '%' . $request->date . '%');
                    })
                    ->orderBy('date', 'desc')
                    ->paginate(5);

        return view('admin.pages.schedule-doctor.index', compact([
            'schedules',
            'doctorCategories',
            'searchCategory',
            'search',
            'searchDate'
        ]));
    }

    public function create()
    {
        $doctors = Doctor::with('doctorCategory')->get();

        return view('admin.pages.schedule-doctor.create', compact('doctors'));
    }

    public function store(ScheduleDoctorRequest $request)
    {
        try {
            $scheduleDoctor = ScheduleDoctor::create([
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'doctor_id' => $request->doctor_id,
            ]);

            return redirect()->route('schedule-doctor.index')->with('success', 'Schedule Doctor created successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('schedule-doctor.create')->with('error', 'Something went wrong.');
        }
    }

    public function edit(Request $request, $id)
    {
        $doctors = Doctor::with('doctorCategory')->get();
        $scheduleDoctor = ScheduleDoctor::find($id);

        return view('admin.pages.schedule-doctor.edit', compact(['scheduleDoctor', 'doctors']));
    }

    public function update(ScheduleDoctorRequest $request, $id)
    {
        try {
            $scheduleDoctor = ScheduleDoctor::find($id);
            $getSchedule = ScheduleDoctor::where('id', $id)->first();
            if(!empty($request->start_time) || $request->start_time != null || $request->start_time != '') {
                $scheduleDoctor->start_time = $request->start_time;
            }
            if(!empty($request->end_time) || $request->end_time != null || $request->end_time != '' && $request->end_time > $getSchedule->start_time) {
                $scheduleDoctor->end_time = $request->end_time;
            }
            $scheduleDoctor->update([
                'date' => $request->date,
                'doctor_id' => $request->doctor_id,
            ]);
            $scheduleDoctor->save();

            return redirect()->route('schedule-doctor.index')->with('success', 'Schedule Doctor updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('schedule-doctor.edit')->with('error', 'Something went wrong.');
        }
    }

    public function delete(Request $request)
    {
        try {
            $scheduleDoctor = ScheduleDoctor::find($request->id);
            $scheduleDoctor->delete();

            return redirect()->route('schedule-doctor.index')->with('success', 'Schedule Doctor deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('schedule-doctor.index')->with('error', 'Something went wrong.');
        }
    }

}
