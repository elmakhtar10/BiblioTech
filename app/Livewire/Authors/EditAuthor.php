<?php

namespace App\Livewire\Authors;

use App\Models\Author;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditAuthor extends Component
{
    use WithFileUploads;
    public $showEditForm = false;
    public $prenom, $nom, $biographie, $photo;
    public $successMessage = null;
    public $author;
    protected $rules = [
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'biographie' => 'required|string|max:1000',
        'photo' => 'nullable|image|mimes:jpg,png,gif|max:2048',
    ];
    protected $listeners = ['openForm' => 'openEditForm'];
    public function openEditForm($authorId){
        $this->author = Author::find($authorId);
        $this->prenom = $this->author->prenom;
        $this->nom = $this->author->nom;
        $this->biographie = $this->author->biographie;

        $this->showEditForm = true;
    }

    public function updateAuthor(){
        $this->validate();
        $filename = $this->photo ? $this->photo->store('authors', 'public') : $this->author->photo;
        $this->author->update([
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'biographie' => $this->biographie,
            'photo' => $filename
        ]);
        $this->showEditForm = false;
        $this->dispatch('updateAuthor');
        $this->successMessage = "Auteur Modifier avec success";
    }
    public function closeEditForm(){
        $this->showEditForm = false;
    }
    public function render()
    {

        return view('livewire.authors.edit-author');
    }
}
