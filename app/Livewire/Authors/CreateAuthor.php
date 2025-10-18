<?php

namespace App\Livewire\Authors;

use App\Models\Author;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAuthor extends Component
{
    use WithFileUploads;
    public $successMessage = null;

    public $prenom, $nom, $biographie, $photo;
    public $showForm = false; // pour gérer l'affichage du modal

    protected $rules = [
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'biographie' => 'required|string|max:1000',
        'photo' => 'nullable|image|mimes:jpg,png,gif|max:2048',
    ];

    public function openForm()
    {
        $this->reset(['prenom', 'nom', 'biographie', 'photo']);
        $this->showForm = true;
    }

    public function closeForm()
    {
        $this->showForm = false;
    }

    public function saveAuthor()
    {
        $this->validate();

        $filename = $this->photo ? $this->photo->store('authors', 'public') : null;

        Author::create([
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'biographie' => $this->biographie,
            'photo' => $filename,
        ]);

        $this->showForm = false;

        $this->dispatch('auteurCree');
        $this->successMessage = "Auteur créé avec succès !";
    }

    public function render()
    {
        return view('livewire.authors.create-author');
    }
}
