// resources/views/settings/index.blade.php

@extends('layout')

@section('content')
    <h1>Settings</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="dark_mode">Dark Mode</label>
            <input type="checkbox" name="dark_mode" id="dark_mode" {{ $setting->dark_mode ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
@endsection