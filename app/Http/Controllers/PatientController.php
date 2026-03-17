<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\HealthRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    // Show patient dashboard with upcoming and recent appointments
    public function dashboard()

    {
        $user = auth()->user();

<<<<<<< HEAD
        // Get the next upcoming appointment that is not cancelled
=======
        // Auto-mark past appointments as completed

        Appointment::where('user_id', $user->id)
            ->whereDate('appointment_date', '<=', now()->toDateString())
            ->whereRaw('LOWER(status) != ?', ['cancelled'])
            ->whereRaw('LOWER(status) != ?', ['completed'])
            ->update(['status' => 'Completed']);

        // Get the next upcoming appointment that is not cancelled

>>>>>>> c6e839e (add files)
        $upcomingAppointments = Appointment::where('user_id', $user->id)
            ->whereDate('appointment_date', '>=', now()->toDateString())
            ->whereRaw('LOWER(status) != ?', ['cancelled'])
            ->orderBy('appointment_date', 'asc')
            ->orderBy('time_slot', 'asc')
            ->take(1)
            ->get();

        // Get last 5 appointments to show in the table
        $appointments = Appointment::where('user_id', $user->id)
            ->orderBy('appointment_date', 'desc')
            ->orderBy('time_slot', 'desc')
            ->take(5)
            ->get();

<<<<<<< HEAD
=======
        // Get last 5 appointments to show in the table

        $appointments = Appointment::where('user_id', $user->id)
            ->orderBy('appointment_date', 'desc')
            ->orderBy('time_slot', 'desc')
            ->take(5)
            ->get();



>>>>>>> c6e839e (add files)
        return view('pages.patient.dashboard', compact('upcomingAppointments', 'appointments'));
    }

    // Show all appointments for the logged in patient
    public function appointments()
    {

        // Auto-mark past appointments as completed
        Appointment::where('user_id', auth()->id())
            ->whereDate('appointment_date', '<=', now()->toDateString())
            ->whereRaw('LOWER(status) != ?', ['cancelled'])
            ->whereRaw('LOWER(status) != ?', ['completed'])
            ->update(['status' => 'Completed']);


        $appointments = Appointment::where('user_id', auth()->id())
            ->orderBy('appointment_date', 'asc')
            ->orderBy('time_slot', 'asc')
            ->get();

        return view('pages.patient.appointments', compact('appointments'));
    }

<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
    // Show health records for the logged in patient
    public function records()
    {
        $user = Auth::user();

        // Get records ordered by most recent first
        $records = HealthRecord::where('patient_id', $user->id)
            ->orderBy('record_date', 'desc')
            ->get();

        return view('pages.patient.records', compact('records'));

    }

    // Show profile page
    public function profile()
    {
        $user = Auth::user();

        return view('pages.patient.profile', compact('user'));

    }

    // Update profile info (name, email, phone, address)
    public function updateProfile(Request $request)

    {
        $user = Auth::user();

        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone'   => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
        ]);

        $user->name    = $request->name;
        $user->email   = $request->email;
        $user->phone   = $request->phone;
        $user->address = $request->address;
        $user->save();


        return back()->with('success', 'Profile updated successfully.');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:6|confirmed',
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
        ]);

        $user = Auth::user();

        // Check the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();


        return back()->with('success', 'Password updated successfully.');
    }

<<<<<<< HEAD
    // Cancel an appointment 
=======
    // Cancel an appointment
>>>>>>> c6e839e (add files)
    public function cancelAppointment($id)
    {
        
        $appointment = Appointment::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($appointment->status !== 'Completed') {

            $appointment->status = 'Cancelled';
            $appointment->save();
        }

        
        return back()->with('success', 'Appointment cancelled successfully.');
    }
}