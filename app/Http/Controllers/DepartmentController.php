<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Service;
use App\Models\User;

class DepartmentController extends Controller
{
    // Show a single department page with its doctors and services
    public function show($id)

    {
        // Get the department from the database
        $department = Department::findOrFail($id);

<<<<<<< HEAD
        // Get all doctors that belong to this department
        $doctors = User::where('role', 'doctor')
            ->where('department_id', $department->id)
            ->get();

        // Get all services that belong to this department
=======

        // Get all doctors that belong to this department
        $doctors = User::where('role', 'doctor')
            ->where('department_id', $department->id)

            ->get();

        // Get all services that belong to this department
        
>>>>>>> c6e839e (add files)
        $services = Service::where('department_id', $department->id)->get();

        return view('pages.department-details', compact('department', 'doctors', 'services'));
    }
}