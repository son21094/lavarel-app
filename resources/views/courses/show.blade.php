@extends('layout')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Courses Page</div>
            <div class="card-body">
                <h5 class="card-title">Name : {{ $courses->name }}</h5>
                <p class="card-text"><h5>Credits : {{ $courses->credits }}</h5></p>
                <p class="card-text"><h5>Duration : {{ $courses->duration() }}</h5></p>
            </div>
        </div>
    </div>
</div>

@endsection
