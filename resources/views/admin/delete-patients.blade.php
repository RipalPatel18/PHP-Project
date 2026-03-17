@extends('layouts.admin')

@section('title', 'Delete Patient Accounts')

@section('content')
<<<<<<< HEAD
<div class="container py-5">

    <h2 class="fw-bold mb-4">Delete Patient Accounts</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 ps-4">Name</th>
                            <th class="py-3">Email</th>
                            <th class="py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($patients as $patient)
                            <tr>
                                <td class="ps-4">{{ $patient->name }}</td>
                                <td>{{ $patient->email }}</td>
                                <td class="text-center">
                                    <form method="POST"
                                          action="{{ route('admin.delete-patients.destroy', $patient->id) }}"
                                          class="d-inline"
                                          onsubmit="return confirm('Delete this patient? This cannot be undone.')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-5 text-muted">No patients found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
=======
    <div class="container py-5">
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
            <h2 class="fw-bold mb-4">Delete Patient Accounts</h2>
        </div>
        @if(session('success'))

            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 ps-4">Name</th>
                                <th class="py-3">Email</th>
                                <th class="py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse($patients as $patient)
                                <tr>
                                    <td class="ps-4">{{ $patient->name }}</td>
                                    <td>{{ $patient->email }}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('admin.delete-patients.destroy', $patient->id) }}"
                                            class="d-inline"
                                            onsubmit="return confirm('Delete this patient? This cannot be undone.')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty

                                <tr>
                                    <td colspan="3" class="text-center py-5 text-muted">No patients found.</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
>>>>>>> c6e839e (add files)
@endsection