@extends('layouts.app')

@section('title', 'Historiques')

@section('content')
    <h1 class="my-4">Historiques de l'abonné</h1>
    <div>
{{--        @if($successMessage)--}}
{{--            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center"--}}
{{--                 role="alert"--}}
{{--                 style="position: fixed; top: 20px; right: 20px; z-index: 1050; min-width: 300px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">--}}
{{--                <i class="bi bi-check-circle-fill flex-shrink-0 me-2" style="font-size: 1.5rem;"></i>--}}
{{--                <div>--}}
{{--                    <strong>Réussie !</strong> {{ $successMessage }}--}}
{{--                </div>--}}
{{--                <button type="button" class="btn-close" wire:click="$set('successMessage', null)" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--        @endif--}}

        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center mb-3 gap-3">

            <!-- Recherche -->
            <div class="position-relative flex-grow-1" style="max-width: 400px;">
                <input type="text" class="form-control ps-5" placeholder="Recherche par Titre ou Auteur..." wire:model.live.debounce.300ms="search">
                <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-muted">
                <i class="bi bi-search"></i>
            </span>
            </div>

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3 px-3 pb-3 gap-3">

                <!-- Per Page -->
                <div class="d-flex align-items-center gap-2">
                    <label class="form-label small mb-0">Status:</label>
                    <select class="form-select form-select-sm" style="width: auto;" wire:model.live="perStatus">
                        <option value="Tout"> Tout</option>
                        <option value="EN_COURS"> En cours</option>
                        <option value="TERMINEE">TERMINEE</option>
                        <option value="ANNULEE">ANNULEE</option>

                    </select>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row g-4">
                @foreach($books as $book)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-img-wrapper" style="height: 220px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                                <img
                                    src="{{ asset('storage/'.$book->image) }}"
                                    class="card-img-top img-fluid"
                                    alt="Image du livre"
                                    style="height: 100%; width: auto; object-fit: cover;"
                                >
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate" title="{{ $book->titre }}">{{ $book->titre }}</h5>
                                <p class="card-text small text-muted flex-grow-1">
                                    <strong>Auteur :</strong> {{ $book->prenom." ".$book->nom }}<br>
                                    <strong>Description :</strong> {{ Str::limit($book->description, 60) }}<br>
                                    <strong>Exemplaires :</strong> {{ $book->nombre_exemplaires }}<br>
                                    <strong>Publication :</strong> {{ \Carbon\Carbon::parse($book->date_publication)->format('d-m-Y') }}<br>
                                    <strong>Status :</strong> {{ $book->status }}<br>
                                </p>
                                @if($book->status == 'EN_COURS')
                                    <button type="button" class="btn btn-danger" wire:click="changeStatus({{$book->reservation_id}})">
                                        ANNULER
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($books->isEmpty())
                <div class="alert alert-warning mt-4" role="alert">
                    L'abonné n'a pas encore de reservation.
                </div>
            @endif

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3 px-3 pb-3 gap-3">

                <!-- Per Page -->
                <div class="d-flex align-items-center gap-2">
                    <label class="form-label small mb-0">Per Page:</label>
                    <select class="form-select form-select-sm" style="width: auto;" wire:model.live="perPage">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>


                {{--            <!-- Pagination -->--}}
                <div>
                    {{$books->links()}}

                </div>

            </div>
        </div>



    </div>

@endsection


