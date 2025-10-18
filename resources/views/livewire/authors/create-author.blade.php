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

    <!-- Bouton Ajouter Auteur -->
    <button class="btn btn-primary mb-3" wire:click="openForm">
        <i class="bi bi-plus-circle"></i> Ajouter Auteur
    </button>

    <!-- Modal -->
    @if($showForm)
        <div class="modal-backdrop" style="position: fixed; inset:0; background-color: rgba(0,0,0,0.4); z-index:50;"></div>

        <div class="modal-content" style="position: fixed; top: 10%; left: 50%; transform: translateX(-50%); width: 50%; background: #fff; padding: 20px; border-radius: 8px; z-index: 100;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Créer un nouvel auteur</h5>
                <button wire:click="closeForm" style="background:none; border:none; font-size:1.5rem;">&times;</button>
            </div>

            <form wire:submit.prevent="saveAuthor" enctype="multipart/form-data">

                <input type="text" class="form-control mb-2" placeholder="Prénom" wire:model="prenom">
                @error('prenom') <span class="text-danger">{{ $message }}</span> @enderror

                <input type="text" class="form-control mb-2" placeholder="Nom" wire:model="nom">
                @error('nom') <span class="text-danger">{{ $message }}</span> @enderror

                <textarea class="form-control mb-2" placeholder="Biographie" wire:model="biographie"></textarea>
                @error('biographie') <span class="text-danger">{{ $message }}</span> @enderror

                <input type="file" class="form-control mb-2" wire:model="photo" accept="image/*">
                @error('photo') <span class="text-danger">{{ $message }}</span> @enderror

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="button" class="btn btn-secondary" wire:click="closeForm">Annuler</button>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>

            </form>
        </div>
    @endif
</div>
