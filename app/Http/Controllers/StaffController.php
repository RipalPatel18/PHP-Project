<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // AppointedRequest
    public function index()

    {
        $appointments = Appointment::with('user')
            ->orderBy('appointment_date', 'asc')
            ->orderBy('time_slot', 'asc')
            ->get();

        return view('pages.staff.appointments', compact('appointments'));
    }

    //update status for appo.
    public function updateStatus(Request $request, $id)

    {
        $request->validate([
            'status' => 'required|in:Upcoming,Confirmed,Completed,Cancelled',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->status = $request->status;
        $appointment->save();

        return back()->with('success', 'Appointment status updated.');
    }
}