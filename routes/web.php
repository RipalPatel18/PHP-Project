<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffController;


/* Web Routes */

// Home page
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Dashboard redirect after login
Route::get('/dashboard', function () {
    return redirect('/redirect');
})->middleware(['auth'])->name('dashboard');


// Find doctor pages

Route::get('/find-doctor', [DoctorController::class, 'index'])->name('find-doctor');
Route::get('/doctor-profile/{id}', [DoctorController::class, 'show'])->name('doctor-profile');

// Services and departments
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('service.show');


Route::get('/book-appointment', [AppointmentController::class, 'create'])->name('book-appointment');
Route::post('/book-appointment', [AppointmentController::class, 'store'])->middleware('auth')->name('book-appointment.store');

Route::get('/department/{id}', [DepartmentController::class, 'show'])->name('department.show');


Route::get('/department/{id}', [DepartmentController::class, 'show'])->name('department.show');

// Book appointment
Route::get('/book-appointment', [AppointmentController::class, 'create'])->name('book-appointment');
Route::post('/book-appointment', [AppointmentController::class, 'store'])->middleware('auth')->name('book-appointment.store');


// Static pages
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', function () {
    return back()->with('success', 'Your message has been sent successfully!');
})->name('contact.send');


// Redirect by role after login

Route::get('/redirect', function () {
    $role = auth()->user()->role;

    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($role === 'doctor') {
        return redirect()->route('doctor.dashboard');
    }

    return redirect()->route('patient.dashboard');
})->middleware(['auth'])->name('redirect');

/* Patient Routes */
Route::middleware(['auth'])->prefix('patient')->name('patient.')->group(function () {
    Route::get('/dashboard', [PatientController::class, 'dashboard'])->name('dashboard');
    Route::get('/appointments', [PatientController::class, 'appointments'])->name('appointments');
    Route::get('/records', [PatientController::class, 'records'])->name('records');
    Route::get('/profile', [PatientController::class, 'profile'])->name('profile');

    Route::post('/profile/update', [PatientController::class, 'updateProfile'])->name('profile.update');
    Route::post('/password/update', [PatientController::class, 'updatePassword'])->name('password.update');
    Route::post('/appointments/{id}/cancel', [PatientController::class, 'cancelAppointment'])->name('appointments.cancel');
});

/* Doctor Routes */
Route::middleware(['auth'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('dashboard');

    Route::get('/appointments', [DoctorController::class, 'appointments'])->name('appointments');
    Route::patch('/appointments/{id}/confirm', [DoctorController::class, 'confirmAppointment'])->name('appointments.confirm');
    Route::patch('/appointments/{id}/cancel', [DoctorController::class, 'cancelAppointment'])->name('appointments.cancel');

    Route::get('/availability', [DoctorController::class, 'availability'])->name('availability');
    Route::post('/availability', [DoctorController::class, 'storeAvailability'])->name('availability.store');
    Route::delete('/availability/{id}', [DoctorController::class, 'deleteAvailability'])->name('availability.delete');

    Route::get('/profile', [DoctorController::class, 'profile'])->name('profile');
    Route::patch('/profile/update', [DoctorController::class, 'updateProfile'])->name('profile.update');
    Route::patch('/password/update', [DoctorController::class, 'updatePassword'])->name('password.update');
});

/* Admin Routes */
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/manage-doctors', [AdminController::class, 'manageDoctors'])->name('manage-doctors');
    Route::post('/manage-doctors', [AdminController::class, 'createDoctor'])->name('manage-doctors.create');
    Route::get('/manage-doctors/{id}/edit', [AdminController::class, 'editDoctor'])->name('manage-doctors.edit');
    Route::patch('/manage-doctors/{id}', [AdminController::class, 'updateDoctor'])->name('manage-doctors.update');
    Route::delete('/manage-doctors/{id}', [AdminController::class, 'deleteDoctor'])->name('manage-doctors.delete');

    Route::get('/manage-services', [AdminController::class, 'manageServices'])->name('manage-services');
    Route::post('/manage-services', [AdminController::class, 'createService'])->name('manage-services.create');
    Route::delete('/manage-services/{id}', [AdminController::class, 'deleteService'])->name('manage-services.delete');

    Route::patch('/manage-services/{id}', [AdminController::class, 'updateService'])->name('manage-services.update');


    Route::get('/manage-departments', [AdminController::class, 'manageDepartments'])->name('manage-departments');
    Route::post('/manage-departments', [AdminController::class, 'createDepartment'])->name('manage-departments.create');
    Route::delete('/manage-departments/{id}', [AdminController::class, 'deleteDepartment'])->name('manage-departments.delete');


    Route::get('/delete-patients', [AdminController::class, 'deletePatients'])->name('delete-patients');

    Route::delete('/delete-patients/{id}', [AdminController::class, 'deletePatient'])->name('delete-patients.destroy');

    Route::patch('/manage-services/{id}', [AdminController::class, 'updateService'])->name('manage-services.update');
    Route::patch('/manage-departments/{id}', [AdminController::class, 'updateDepartment'])->name('manage-departments.update');

    Route::patch('/manage-departments/{id}', [AdminController::class, 'updateDepartment'])->name('manage-departments.update');

    Route::get('/delete-patients', [AdminController::class, 'deletePatients'])->name('delete-patients');
    Route::delete('/delete-patients/{id}', [AdminController::class, 'deletePatient'])->name('delete-patients.destroy');
});

/* Staff Routes */
Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/appointments', [StaffController::class, 'index'])->name('staff.appointments.index');
    Route::post('/staff/appointments/{id}/update-status', [StaffController::class, 'updateStatus'])->name('staff.appointments.updateStatus');

require __DIR__ . '/auth.php';
