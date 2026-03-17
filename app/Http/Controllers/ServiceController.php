<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Service;
use App\Models\User;

class ServiceController extends Controller
{
    // Show all services and departments on the services page
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
    public function index()
    {
        $departments = Department::orderBy('name')->get();
        $services    = Service::with('department')->orderBy('name')->get();

        return view('pages.services', compact('departments', 'services'));
    }

    // Show a single service detail page
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
    public function show($id)
    {
        // Get the service with its department from the database
        $service = Service::with('department')->findOrFail($id);

        return view('pages.service-details', compact('service'));
    }

    // Show a single department detail page
    public function showDepartment($id)

    {
        // Get the department from the database
        $department = Department::findOrFail($id);

        // Get all doctors that belong to this department
        $doctors = User::where('role', 'doctor')
            ->where('department_id', $department->id)
<<<<<<< HEAD
            ->get();

        // Get all services that belong to this department
        $services = Service::where('department_id', $department->id)->get();

=======

            ->get();

        // Get all services that belong to this department
        $services = Service::where('department_id', $department->id)->get();
        

>>>>>>> c6e839e (add files)
        return view('pages.department-details', compact('department', 'doctors', 'services'));
    }
}