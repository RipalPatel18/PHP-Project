@extends('layouts.site')

@section('title', 'Health Records')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4">Health Records</h2>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 ps-4 text-center">Date</th>
                            <th class="py-3 text-center">Doctor</th>
                            <th class="py-3 text-center">Diagnosis</th>
                            <th class="py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($records as $record)
                            <tr>
                                <td class="ps-4 text-center">{{ \Carbon\Carbon::parse($record->record_date)->format('M d, Y') }}</td>
                                <td class="text-center">
                                    {{ optional(\App\Models\User::find($record->doctor_id))->name ?? 'Unknown' }}
                                </td>
                                <td class="text-center">{{ $record->diagnosis }}</td>
                                <td class="text-center">
                                    <button class="btn btn-outline-secondary btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#recordModal{{ $record->id }}">
                                        View
                                    </button>
                                </td>
                            </tr>

                            {{-- View Record Modal --}}
                            <div class="modal fade" id="recordModal{{ $record->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content rounded-4 border-0">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title fw-semibold">Record Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($record->record_date)->format('M d, Y') }}</p>
                                            <p><strong>Doctor:</strong> {{ optional(\App\Models\User::find($record->doctor_id))->name ?? 'Unknown' }}</p>
                                            <p><strong>Diagnosis:</strong> {{ $record->diagnosis }}</p>
                                            <p><strong>Details:</strong> {{ $record->details ?? '—' }}</p>
                                            <p><strong>Type:</strong> {{ ucfirst(str_replace('_', ' ', $record->record_type)) }}</p>
                                            @if($record->notes)
                                                <p><strong>Notes:</strong> {{ $record->notes }}</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No health records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection