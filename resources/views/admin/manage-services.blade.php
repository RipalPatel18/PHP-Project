@extends('layouts.admin')

@section('title', 'Manage Services & Departments')

@section('content')
    <div class="container py-5">

<<<<<<< HEAD
    <h2 class="fw-bold mb-4">Manage Services & Departments</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<!-- Tabs -->
    <div class="d-flex gap-2 mb-4">
        <button class="btn btn-primary px-4" id="tab-services" onclick="showTab('services')">Services</button>
        <button class="btn btn-outline-primary px-4" id="tab-departments" onclick="showTab('departments')">Departments</button>
    </div>
<!-- Services Tab -->
    <div id="pane-services">
        <div class="mb-3">
            <button class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#addServiceModal">Add Service</button>
        </div>
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 ps-4">Service Name</th>
                                <th class="py-3">Department</th>
                                <th class="py-3">Duration</th>
                                <th class="py-3">Price</th>
                                <th class="py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr>
                                    <td class="ps-4">{{ $service->name }}</td>
                                    <td>{{ $service->department->name ?? '—' }}</td>
                                    <td>{{ $service->duration_minutes }} mins</td>
                                    <td>${{ number_format($service->price, 0) }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-success btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editServiceModal{{ $service->id }}">Edit</button>

                                        <form method="POST" action="{{ route('admin.manage-services.delete', $service->id) }}"
                                              class="d-inline" onsubmit="return confirm('Delete this service?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm ms-1">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Service Modal -->
                                
                                <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content rounded-4 border-0">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold">Edit Service</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body p-4">
                                                <form method="POST" action="{{ route('admin.manage-services.update', $service->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Service Name</label>
                                                        <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Department</label>
                                                        <select name="department_id" class="form-select" required>
                                                            <option value="">— Select —</option>
                                                            @foreach($departments as $dept)
                                                                <option value="{{ $dept->id }}" {{ $service->department_id == $dept->id ? 'selected' : '' }}>
                                                                    {{ $dept->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Duration (minutes)</label>
                                                        <input type="number" name="duration_minutes" class="form-control" value="{{ $service->duration_minutes }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Price ($)</label>
                                                        <input type="number" name="price" class="form-control" step="0.01" value="{{ $service->price }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Description</label>
                                                        <textarea name="description" class="form-control" rows="2">{{ $service->description }}</textarea>
                                                    </div>
                                                    <div class="d-flex gap-2">
                                                        <button type="submit" class="btn btn-primary px-4">Update Service</button>
                                                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr><td colspan="5" class="text-center py-5 text-muted">No services found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  <!-- Departments Tab  -->
    <div id="pane-departments" style="display:none;">
        <div class="mb-3">
            <button class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#addDeptModal">Add Department</button>
        </div>
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 ps-4">Department Name</th>
                                <th class="py-3">Doctors</th>
                                <th class="py-3">Description</th>
                                <th class="py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($departments as $dept)
                                <tr>
                                    <td class="ps-4">{{ $dept->name }}</td>
                                    <td>{{ $dept->doctors_count }}</td>
                                    <td>{{ $dept->description ?? '—' }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-success btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editDeptModal{{ $dept->id }}">Edit</button>

                                        <form method="POST" action="{{ route('admin.manage-departments.delete', $dept->id) }}"
                                              class="d-inline" onsubmit="return confirm('Delete this department?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm ms-1">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                               <!-- Edit Department Modal -->
                                <div class="modal fade" id="editDeptModal{{ $dept->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content rounded-4 border-0">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold">Edit Department</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body p-4">
                                                <form method="POST" action="{{ route('admin.manage-departments.update', $dept->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Department Name</label>
                                                        <input type="text" name="name" class="form-control" value="{{ $dept->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Description</label>
                                                        <textarea name="description" class="form-control" rows="2">{{ $dept->description }}</textarea>
                                                    </div>
                                                    <div class="d-flex gap-2">
                                                        <button type="submit" class="btn btn-primary px-4">Update Department</button>
                                                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr><td colspan="4" class="text-center py-5 text-muted">No departments found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Add Service Modal  -->
<div class="modal fade" id="addServiceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-semibold">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('admin.manage-services.create') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Service Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Department</label>
                        <select name="department_id" class="form-select" required>
                            <option value="">— Select —</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Duration (minutes)</label>
                        <input type="number" name="duration_minutes" class="form-control" value="30" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Price ($)</label>
                        <input type="number" name="price" class="form-control" step="0.01" value="0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">Add Service</button>
                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Department Modal -->
<div class="modal fade" id="addDeptModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-semibold">Add New Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('admin.manage-departments.create') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Department Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">Add Department</button>
                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function showTab(tab) {
    document.getElementById('pane-services').style.display    = tab === 'services'    ? 'block' : 'none';
    document.getElementById('pane-departments').style.display = tab === 'departments' ? 'block' : 'none';
    document.getElementById('tab-services').className    = tab === 'services'    ? 'btn btn-primary px-4'      : 'btn btn-outline-primary px-4';
    document.getElementById('tab-departments').className = tab === 'departments' ? 'btn btn-primary px-4'      : 'btn btn-outline-primary px-4';
}
</script>
=======
        <h2 class="fw-bold mb-4">Manage Services & Departments</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabs -->
        <div class="d-flex gap-2 mb-4">
            <button class="btn btn-primary px-4" id="tab-services" onclick="showTab('services')">Services</button>
            <button class="btn btn-outline-primary px-4" id="tab-departments"
                onclick="showTab('departments')">Departments</button>
        </div>
        <!-- Services Tab -->
        <div id="pane-services">
            <div class="mb-3">
                <button class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#addServiceModal">Add
                    Service</button>
            </div>
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-0">
                    <div class="table-responsive">

                    
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="py-3 ps-4">Service Name</th>
                                    <th class="py-3">Department</th>
                                    <th class="py-3">Duration</th>
                                    <th class="py-3">Price</th>
                                    <th class="py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $service)
                                    <tr>
                                        <td class="ps-4">{{ $service->name }}</td>
                                        <td>{{ $service->department->name ?? '—' }}</td>
                                        <td>{{ $service->duration_minutes }} mins</td>
                                        <td>${{ number_format($service->price, 0) }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editServiceModal{{ $service->id }}">Edit</button>

                                            <form method="POST"
                                                action="{{ route('admin.manage-services.delete', $service->id) }}"
                                                class="d-inline" onsubmit="return confirm('Delete this service?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm ms-1">Delete</button>
                                            </form>
                                        </td>
                                    </tr>



                                    <!-- Edit Service Modal -->

                                    <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content rounded-4 border-0">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title fw-semibold">Edit Service</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <form method="POST"
                                                        action="{{ route('admin.manage-services.update', $service->id) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Service Name</label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $service->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Department</label>
                                                            <select name="department_id" class="form-select" required>
                                                                <option value="">— Select —</option>
                                                                @foreach($departments as $dept)
                                                                    <option value="{{ $dept->id }}" {{ $service->department_id == $dept->id ? 'selected' : '' }}>
                                                                        {{ $dept->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Duration (minutes)</label>
                                                            <input type="number" name="duration_minutes" class="form-control"
                                                                value="{{ $service->duration_minutes }}" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Price ($)</label>
                                                            <input type="number" name="price" class="form-control" step="0.01"
                                                                value="{{ $service->price }}" required>
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Description</label>
                                                            <textarea name="description" class="form-control"
                                                                rows="2">{{ $service->description }}</textarea>
                                                        </div>
                                                        <div class="d-flex gap-2">
                                                            <button type="submit" class="btn btn-primary px-4">Update
                                                                Service</button>
                                                            <button type="button" class="btn btn-outline-secondary px-4"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">No services found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Departments Tab  -->
        <div id="pane-departments" style="display:none;">
            <div class="mb-3">
                <button class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#addDeptModal">Add
                    Department</button>
            </div>
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="py-3 ps-4">Department Name</th>
                                    <th class="py-3">Doctors</th>
                                    <th class="py-3">Description</th>
                                    <th class="py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($departments as $dept)
                                    <tr>
                                        <td class="ps-4">{{ $dept->name }}</td>
                                        <td>{{ $dept->doctors_count }}</td>
                                        <td>{{ $dept->description ?? '—' }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editDeptModal{{ $dept->id }}">Edit</button>

                                            <form method="POST"
                                                action="{{ route('admin.manage-departments.delete', $dept->id) }}"
                                                class="d-inline" onsubmit="return confirm('Delete this department?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm ms-1">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Edit Department Modal -->
                                    <div class="modal fade" id="editDeptModal{{ $dept->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content rounded-4 border-0">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title fw-semibold">Edit Department</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <form method="POST"
                                                        action="{{ route('admin.manage-departments.update', $dept->id) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Department Name</label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $dept->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Description</label>
                                                            <textarea name="description" class="form-control"
                                                                rows="2">{{ $dept->description }}</textarea>
                                                        </div>
                                                        <div class="d-flex gap-2">
                                                            <button type="submit" class="btn btn-primary px-4">Update
                                                                Department</button>
                                                            <button type="button" class="btn btn-outline-secondary px-4"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">No departments found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Add Service Modal  -->
    <div class="modal fade" id="addServiceModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 border-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-semibold">Add New Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form method="POST" action="{{ route('admin.manage-services.create') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Service Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Department</label>
                            <select name="department_id" class="form-select" required>
                                <option value="">— Select —</option>
                                @foreach($departments as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Duration (minutes)</label>
                            <input type="number" name="duration_minutes" class="form-control" value="30" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Price ($)</label>
                            <input type="number" name="price" class="form-control" step="0.01" value="0" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4">Add Service</button>
                            <button type="button" class="btn btn-outline-secondary px-4"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Department Modal -->
    <div class="modal fade" id="addDeptModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 border-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-semibold">Add New Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form method="POST" action="{{ route('admin.manage-departments.create') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Department Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4">Add Department</button>
                            <button type="button" class="btn btn-outline-secondary px-4"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tab) {
            document.getElementById('pane-services').style.display = tab === 'services' ? 'block' : 'none';
            document.getElementById('pane-departments').style.display = tab === 'departments' ? 'block' : 'none';
            document.getElementById('tab-services').className = tab === 'services' ? 'btn btn-primary px-4' : 'btn btn-outline-primary px-4';
            document.getElementById('tab-departments').className = tab === 'departments' ? 'btn btn-primary px-4' : 'btn btn-outline-primary px-4';
        }
    </script>
>>>>>>> c6e839e (add files)
@endsection