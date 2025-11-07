@extends('layouts.app')

@section('title', 'Compte suspendu')

@section('content')
    <div class="alert alert-danger mt-5 text-center">
        <h4>Votre compte a été suspendu.</h4>
        <p>Veuillez contacter l’administration pour plus d’informations.</p>
        <a href="{{ route('login.form') }}" class="btn btn-primary mt-3">Retour à la connexion</a>
    </div>
@endsection
