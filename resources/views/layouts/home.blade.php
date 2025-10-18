@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
    <h1 class="mt-5">Bienvenue {{Auth::user()->prenom." ". Auth::user()->nom}}</h1>
@endsection
