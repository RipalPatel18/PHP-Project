<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\DoctorAvailability;
use App\Models\Department;

class DoctorController extends Controller
{
    // Show doctor dashboard with stats and recent appointments
    public function dashboard()
    {
        $doctor = Auth::user();

<<<<<<< HEAD
        // Get all appointments for this doctor
        $appointments = Appointment::where('doctor', $doctor->name)
            ->orderBy('appointment_date')
=======

        // Get all appointments for this doctor
        $appointments = Appointment::where('doctor', $doctor->name)
            ->orderBy('appointment_date')

>>>>>>> c6e839e (add files)
            ->get();

        // Count appointments by status
        $upcoming  = $appointments->where('status', 'Upcoming')->count();
        $today     = $appointments
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
            ->where('status', 'Upcoming')
            ->where('appointment_date', today()->toDateString())
            ->count();
        $cancelled = $appointments->where('status', 'Cancelled')->count();
        $total     = $appointments->count();

        // Get last 5 appointments to show in the dashboard table
        $recentAppointments = Appointment::where('doctor', $doctor->name)
            ->orderByDesc('appointment_date')
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
            ->limit(5)
            ->get();

        return view('doctor.dashboard', compact(
<<<<<<< HEAD
=======


>>>>>>> c6e839e (add files)
            'doctor', 'upcoming', 'today', 'cancelled', 'total', 'recentAppointments'
        ));
    }

    // Show all appointments for the logged in doctor
    public function appointments()
<<<<<<< HEAD
    {
        $doctor = Auth::user();

=======

    {
        $doctor = Auth::user();


>>>>>>> c6e839e (add files)
        $appointments = Appointment::where('doctor', $doctor->name)
            ->orderBy('appointment_date')
            ->get();

<<<<<<< HEAD
=======


>>>>>>> c6e839e (add files)
        return view('doctor.appointments', compact('appointments'));
    }

    // Confirm an appointment
    public function confirmAppointment($id)
<<<<<<< HEAD
    {
        $appointment = Appointment::findOrFail($id);

        // Make sure this appointment belongs to the logged in doctor
        $this->authorizeDoctorAppointment($appointment);

        $appointment->update(['status' => 'Confirmed']);

        return back()->with('success', 'Appointment confirmed.');
=======

    {
        $appointment = Appointment::findOrFail($id);

        // appointment belongs to the logged in doctor
        $this->authorizeDoctorAppointment($appointment);


        $appointment->update(['status' => 'Confirmed']);

        return back()->with('success', 'Appointment confirmed.');

>>>>>>> c6e839e (add files)
    }

    // Cancel an appointment
    public function cancelAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);

<<<<<<< HEAD
        // Make sure this appointment belongs to the logged in doctor
=======
        // appointment belongs to the logged in doctor
>>>>>>> c6e839e (add files)
        $this->authorizeDoctorAppointment($appointment);

        $appointment->update(['status' => 'Cancelled']);

<<<<<<< HEAD
        return back()->with('success', 'Appointment cancelled.');
    }

    // Check that the appointment belongs to the logged in doctor
    private function authorizeDoctorAppointment(Appointment $appointment)
    {
        if ($appointment->doctor !== Auth::user()->name) {
=======

        return back()->with('success', 'Appointment cancelled.');
    }


    private function authorizeDoctorAppointment(Appointment $appointment)
    {
        if ($appointment->doctor !== Auth::user()->name) {

>>>>>>> c6e839e (add files)
            abort(403);
        }
    }

    // Show availability page with existing slots
    public function availability()
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
    {
        $doctor = Auth::user();

        // Get all availability slots ordered by day of week
        $availabilities = DoctorAvailability::where('doctor_id', $doctor->id)
            ->orderByRaw("FIELD(day,'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday')")
            ->get();

        return view('doctor.availability', compact('doctor', 'availabilities'));
<<<<<<< HEAD
    }

    // Save a new availability slot (or update if day already exists)
    public function storeAvailability(Request $request)
    {
=======

    }

    // Save a new availability slot 
    public function storeAvailability(Request $request)
    {

>>>>>>> c6e839e (add files)
        $request->validate([
            'day'        => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required',
            'end_time'   => 'required|after:start_time',
        ]);

        // If the doctor already has a slot for this day, update it
        DoctorAvailability::updateOrCreate(
            ['doctor_id' => Auth::id(), 'day' => $request->day],
            ['start_time' => $request->start_time, 'end_time' => $request->end_time]
        );

        return back()->with('success', 'Availability saved successfully.');
    }

    // Delete an availability slot
    public function deleteAvailability($id)
<<<<<<< HEAD
    {
        // Make sure the slot belongs to the logged in doctor before deleting
=======

    {
       
>>>>>>> c6e839e (add files)
        DoctorAvailability::where('id', $id)
            ->where('doctor_id', Auth::id())
            ->firstOrFail()
            ->delete();

        return back()->with('success', 'Availability slot removed.');
    }

    // Show profile page
    public function profile()
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
    {
        $doctor      = Auth::user();
        $departments = Department::orderBy('name')->get();

        return view('doctor.profile', compact('doctor', 'departments'));
    }

<<<<<<< HEAD
    // Update profile info (name, email, phone, address, department, image)
=======
    // Update profile info 
>>>>>>> c6e839e (add files)
    public function updateProfile(Request $request)
    {
        $doctor = Auth::user();

        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $doctor->id,
            'phone'         => 'nullable|string|max:30',
            'address'       => 'nullable|string|max:255',
            'department_id' => 'nullable|exists:departments,id',
            'image'         => 'nullable|image|max:2048',
        ]);

<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
        $data = $request->only('name', 'email', 'phone', 'address', 'department_id');

        // If a new image was uploaded, store it and save the filename
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('doctors', 'public');
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
            $data['image'] = basename($path);
        }

        $doctor->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|min:8|confirmed',
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
        ]);

        $doctor = Auth::user();

        // Check current password is correct before changing
        if (!Hash::check($request->current_password, $doctor->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $doctor->update(['password' => Hash::make($request->password)]);

        return back()->with('success', 'Password updated successfully.');
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
    }

    // Show find a doctor page with search and filter
    public function index(Request $request)
    {
        // Start query for all doctors
        $query = \App\Models\User::where('role', 'doctor')->with('department');

        // Filter by specialty (department) if selected
        if ($request->filled('specialty')) {
            $query->where('department_id', $request->specialty);
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
        }

        // Filter by location if entered
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $doctors     = $query->paginate(12);
        $departments = Department::orderBy('name')->get();

        return view('pages.find-doctor', compact('doctors', 'departments'));
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
    }

    // Show a single doctor profile page
    public function show($id)
    {
        $doctor = \App\Models\User::where('role', 'doctor')
            ->with('department')
            ->findOrFail($id);
            

        return view('pages.doctor-profile', compact('doctor'));
    }
}