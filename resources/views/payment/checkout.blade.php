@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('payment.checkout') }}" method="POST">
        @csrf
        <input type="hidden" name="enrollment_id" value="{{ $enrollment->id }}">
        <input type="hidden" name="amount" value="{{ $amount }}">
        
        <div class="card">
            <div class="card-header">Paiement</div>
            <div class="card-body">
                <p>Montant: {{ number_format($amount, 2) }} DH</p>
                <button type="submit" class="btn btn-primary">Payer avec Stripe</button>
            </div>
        </div>
    </form>
</div>
@endsection