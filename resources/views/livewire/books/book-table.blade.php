<div class="mt-5">
    @if($successMessage)
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center"
             role="alert"
             style="position: fixed; top: 20px; right: 20px; z-index: 1050; min-width: 300px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <i class="bi bi-check-circle-fill flex-shrink-0 me-2" style="font-size: 1.5rem;"></i>
            <div>
                <strong>Réussie !</strong> {{ $successMessage }}
            </div>
            <button type="button" class="btn-close" wire:click="$set('successMessage', null)" aria-label="Close"></button>
        </div>
    @endif
        @if($errorMessage)
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center"
                 role="alert"
                 style="position: fixed; top: 20px; right: 20px; z-index: 1050; min-width: 300px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                <i class="bi bi-exclamation-triangle-fill" style="font-size: 1.5rem;"></i>
                <div>
                    <strong> Echec !</strong> {{ $errorMessage }}
                </div>
                <button type="button" class="btn-close" wire:click="$set('errorMessage', null)" aria-label="Close"></button>
            </div>
        @endif
    <section class="mt-4">
        <div class="container-xl px-4">
            <!-- Card principale -->
            <div class="card shadow-sm rounded-lg overflow-hidden">

                <!-- Barre de recherche + filtre -->
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center mb-3 gap-3">

                    <!-- Recherche -->
                    <div class="position-relative flex-grow-1" style="max-width: 400px;">
                        <input type="text" class="form-control ps-5" placeholder="Search" wire:model.live.debounce.300ms="search">
                        <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-muted">
                            <i class="bi bi-search"></i>
                        </span>
                    </div>

                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-uppercase small">
                        <tr>
                            <th>Photo</th>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Nombre Exemplaires</th>
                            <th>Date Publication</th>
                            <th>Auteurs</th>
                            <th>Date Creation</th>
                            <th>Date Modification</th>
                            <th class="text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($books as $book)
                            <tr wire:key="{{$book->id}}">
                                <td>
                                    <img src="{{ asset('storage/' . $book->image) }}"
                                         alt="Photo auteur"
                                         style="width:50px; height:50px; object-fit:cover; border-radius:50%;">
                                </td>
                                <td>{{$book->id}}</td>
                                <td>{{$book->titre}}</td>
                                <td>{{$book->description}}</td>
                                <td>{{$book->nombre_exemplaires}}</td>
                                <td>{{$book->date_publication}}</td>
                                <td>{{$book->prenom." ".$book->nom}}</td>
                                <td>{{$book->date_creation}}</td>
                                <td>{{$book->date_modification}}</td>


                                <td class="text-end">
                                    {{-- Bouton EDIT --}}
                                    <button class="btn btn-primary btn-sm" wire:click="$dispatch('openForm', [{{ $book->id }}])">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg>
                                    </button>

                                    {{-- Bouton Supprimer --}}
                                    <button class="btn btn-danger btn-sm" onclick="confirm('Voulez-vous vraiment supprimer le livre {{$book->titre}} ?') || event.stopImmediatePropagation()" wire:click="delete({{$book->id}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                    </button>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- Pagination + Per Page -->
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


                    <!-- Pagination -->
                    <div>
                        {{$books->links()}}
                    </div>

                </div>

            </div>
        </div>
    </section>
</div>
