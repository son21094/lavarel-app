@extends('layout')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Batches Page</div>
            <div class="card-body">
                <h5 class="card-title">Name : {{ $batches->name }}</h5>
                <p class="card-text">Course Name : {{ $batches->course->name }}</p>
                <p class="card-text">Teacher: {{ $batches->teacher->name }}</p>
                <p class="card-text">Start Date : {{ $batches->start_date }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
