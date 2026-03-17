@extends('layouts.site')

@section('content')
<h3 class="fw-bold mb-3">Departments</h3>

<div class="list-group shadow-sm">
    @for($i=1; $i<=6; $i++)
    
        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
           href="{{ route('departments.show', $i) }}">

            Department {{ $i }}
            <span class="text-muted small">View</span>
        </a>
    @endfor
</div>
@endsection