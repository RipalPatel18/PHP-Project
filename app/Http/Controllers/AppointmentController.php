<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;

class AppointmentController extends Controller
{
    // Show the book appointment form with list of doctors
    public function create()
    {

        $doctors = User::where('role', 'doctor')->get();

        return view('pages.book-appointment', compact('doctors'));

    }

    // Save the new appointment to the database
    public function store(Request $request)

    {
        $request->validate([
            'doctor'           => 'required|string',
            'appointment_date' => 'required|date',
            'time_slot'        => 'required|string',
            'phone'            => 'required|string',
        ]);

        $user = auth()->user();

<<<<<<< HEAD
        // If user is not logged in, send them to the login page
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first to book an appointment.');
        }

        // Create the appointment using the logged in user's info
        Appointment::create([
            'user_id'          => $user->id,
            'patient_name'     => $user->name,
            'email'            => $user->email,
            'doctor'           => $request->doctor,
            'appointment_date' => $request->appointment_date,
            'time_slot'        => $request->time_slot,
            'phone'            => $request->phone,
            'notes'            => $request->notes,
            'status'           => 'upcoming',
        ]);

=======

        // If user is not logged in, send them to the login page
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first to book an appointment.');
        }


        // Create the appointment using the logged in user's info
        Appointment::create([
            'user_id'          => $user->id,
            'patient_name'     => $user->name,
            'email'            => $user->email,
            'doctor'           => $request->doctor,
            'appointment_date' => $request->appointment_date,
            'time_slot'        => $request->time_slot,
            'phone'            => $request->phone,
            'notes'            => $request->notes,
            'status'           => 'upcoming',
        ]);
        

>>>>>>> c6e839e (add files)
        return redirect()->route('patient.appointments')->with('success', 'Appointment booked successfully!');
    }
}