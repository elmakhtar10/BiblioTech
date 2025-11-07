@extends('layouts.app')

@section('title', 'Reservation')

@section('content')
    <h1 class="my-4">Top 5 des Livres les plus reserves</h1>
    <livewire:reservation.statistiques/>
@endsection
