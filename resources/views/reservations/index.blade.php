@extends('layouts.app')

@section('title', 'Reservation')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1 class="mb-0">Reservation</h1>
        <a href="{{ route('historique.show', Auth::id()) }}" class="btn btn-light">
            <i class="bi bi-eye-fill"></i> Historique
        </a>
    </div>

    <livewire:reservation.reservation />
    <livewire:reservation.make-reservation />
@endsection
