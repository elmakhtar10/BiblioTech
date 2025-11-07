<div>

    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center mb-3 gap-3">
        <!-- Recherche -->
        <div class="position-relative flex-grow-1" style="max-width: 400px;">
            <input type="text" class="form-control ps-5" placeholder="Recherche par Titre ou Auteur..." wire:model.live.debounce.300ms="search">
            <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-muted">
                <i class="bi bi-search"></i>
            </span>
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
                                <strong>Publication :</strong> {{ \Carbon\Carbon::parse($book->date_publication)->format('d-m-Y') }}
                            </p>
                            <a wire:click="$dispatch('openReservationForm', [{{ $book->id }}])" class="btn btn-primary btn-sm mt-auto">Réserver</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($books->isEmpty())
            <div class="alert alert-warning mt-4" role="alert">
                Aucun livre trouvé.
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
