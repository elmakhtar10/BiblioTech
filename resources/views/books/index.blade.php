@extends('layouts.app')

@section('title', 'Livres')

@section('content')
    <h1 class="my-4">Liste des Livres</h1>
    <livewire:books.add-book/>
    <livewire:books.book-table/>
    <livewire:books.edit-book/>
@endsection
