@extends('layouts.admin')

@section('title', 'Edit Doctor')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4">Edit Doctor</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-md-5">
            <form method="POST" action="{{ route('admin.manage-doctors.update', $doctor->id) }}">
                @csrf
<<<<<<< HEAD
=======

                
>>>>>>> c6e839e (add files)
                @method('PATCH')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $doctor->email) }}" required>
                    </div>
<<<<<<< HEAD
=======

>>>>>>> c6e839e (add files)
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Department</label>
                        <select name="department_id" class="form-select">
                            <option value="">— Select Department —</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ old('department_id', $doctor->department_id) == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
<<<<<<< HEAD
=======


>>>>>>> c6e839e (add files)
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address', $doctor->address) }}">
                    </div>
<<<<<<< HEAD
                </div>
=======


                </div>

>>>>>>> c6e839e (add files)
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">Update Doctor</button>
                    <a href="{{ route('admin.manage-doctors') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection