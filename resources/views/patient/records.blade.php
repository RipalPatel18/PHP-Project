@extends('layouts.site')

@section('title', 'Health Records')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">Health Records</h2>

    <div class="card">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Date</th>
                            <th class="text-center">Doctor</th>
                            <th class="text-center">Diagnosis</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($records as $record)

                        <tr>

                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($record->record_date)->format('n/j/Y') }}
                            </td>

                            <td class="text-center">
                                {{ $record->doctor_name ?? $record->doctor }}
                            </td>

                            <td class="text-center">
                                {{ $record->diagnosis }}
                            </td>

                            <td class="text-center">

                                <button class="btn btn-outline-secondary btn-sm">
                                    View
                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center py-4">
                                No health records found.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection@extends('layouts.site')

@section('title', 'Health Records')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">Health Records</h2>

    <div class="card">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Date</th>
                            <th class="text-center">Doctor</th>
                            <th class="text-center">Diagnosis</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($records as $record)

                        <tr>

                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($record->record_date)->format('n/j/Y') }}
                            </td>

                            <td class="text-center">
                                {{ $record->doctor_name ?? $record->doctor }}
                            </td>

                            <td class="text-center">
                                {{ $record->diagnosis }}
                            </td>

                            <td class="text-center">

                                <button class="btn btn-outline-secondary btn-sm">
                                    View
                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center py-4">
                                No health records found.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection