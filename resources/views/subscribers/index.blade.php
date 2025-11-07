@extends('layouts.app')

@section('title', 'Reservation')

@section('content')
    <h1 class="my-4">Abonnes</h1>
    <livewire:subscribers.subscribers-table/>
    <livewire:subscribers.edit-subscriber/>
@endsection
