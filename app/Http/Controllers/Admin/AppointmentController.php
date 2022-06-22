<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

use App\Models\User;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['schedules', 'users'])->get();

        return view('admin.pages.appointment.index', compact('appointments'));
    }

    public function delete(Request $request)
    {
        try {
            $appointment = User::find($request->id);
            $appointment->delete();

            return redirect()->route('appointment.index')->with('success', 'Doctor Category deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('appointment.index')->with('error', 'Something went wrong.');
        }
    }
}
