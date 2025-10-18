@extends('layouts.app')

@section('title', 'Auteurs')

@section('content')
    <h1 class="my-4">Liste des Auteurs</h1>
    <livewire:authors.create-author />
    <livewire:authors.authors-table/>
    <livewire:authors.edit-author/>
@endsection
