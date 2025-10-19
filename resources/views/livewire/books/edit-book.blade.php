<div>
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

    <!-- Modal -->
    @if($showForm)
        <div class="modal-backdrop" style="position: fixed; inset:0; background-color: rgba(0,0,0,0.4); z-index:50;"></div>

        <div class="modal-content" style="position: fixed; top: 10%; left: 50%; transform: translateX(-50%); width: 50%; background: #fff; padding: 20px; border-radius: 8px; z-index: 100;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Créer un nouveau livre</h5>
                <button wire:click="closeEditForm" style="background:none; border:none; font-size:1.5rem;">&times;</button>
            </div>

            <form wire:submit.prevent="save" enctype="multipart/form-data">

                <input type="text" class="form-control mb-2" placeholder="Titre" wire:model="titre">
                @error('titre') <span class="text-danger">{{ $message }}</span> @enderror

                <input type="number" class="form-control mb-2" placeholder="Nombre Exemplaires" wire:model="nombre_exemplaires">
                @error('nombre_exemplaires') <span class="text-danger">{{ $message }}</span> @enderror

                <textarea class="form-control mb-2" placeholder="Description" wire:model="description"></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror

                <label for="">Date Publication</label>
                <input type="datetime-local" class="form-control mb-2" wire:model="date_publication">
                @error('date_publication') <span class="text-danger">{{ $message }}</span> @enderror

                <label for="">Date Creation</label>
                <input type="datetime-local" class="form-control mb-2" wire:model="date_creation">
                @error('date_creation') <span class="text-danger">{{ $message }}</span> @enderror

                <label for="">Date Modification</label>
                <input type="datetime-local" class="form-control mb-2" wire:model="date_modification">
                @error('date_modification') <span class="text-danger">{{ $message }}</span> @enderror

                <select class="form-select" wire:model="author_id">
                    <option selected>Selectionner un Auteur</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->prenom." ".$author->nom}}</option>
                    @endforeach
                </select>
                @error('author_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <input type="file" class="form-control mb-2" wire:model="image" accept="image/*">
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="button" class="btn btn-secondary" wire:click="closeEditForm">Annuler</button>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>

            </form>
        </div>
    @endif
</div>
