@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Enrollments Page</div>
            <div class="card-body">
                <h5 class="card-title">Enroll Number : {{ $enrollment->enroll_no }}</h5>
                <p class="card-text">Batch : {{ $enrollment->batch->name }}</p>
                <p class="card-text">Teacher : {{ $enrollment->batch->teacher->name }}</p>

                <p class="card-text">Student : {{ $enrollment->student->name }}</p>
                <p class="card-text">Join Date : {{ $enrollment->join_date }}</p>
                <p class="card-text">Fee : {{ number_format($enrollment->fee, 0, ',', '.') }} VND</p>
            </div>
        </div>
    </div>
</div>

@endsection
