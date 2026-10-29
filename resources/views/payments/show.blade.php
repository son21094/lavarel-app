@extends('layout')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Payments Page</div>
            <div class="card-body">
                <p class="card-text">Student: {{ $payment->enrollment->student->name ?? 'N/A' }}</p>
                <p class="card-text">Paid date: {{ $payment->paid_date }}</p>
                <p class="card-text">Amount: {{ number_format($payment->amount, 0, ',', '.') }} VND</p>
            </div>
        </div>
    </div>
</div>

@endsection