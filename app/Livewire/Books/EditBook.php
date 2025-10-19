<?php

namespace App\Livewire\Books;

use App\Models\Author;
use App\Models\Book;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditBook extends Component
{
    use WithFileUploads;
    public $showForm = false;
    public $titre,$nombre_exemplaires,$description,
        $date_publication,$date_creation,
        $date_modification,$author_id,$image;
    public $book;
    public $successMessage = null;
    protected $listeners = ['openForm'=>'openEditForm'];
    public $rules = [
        'titre' => 'required',
        'nombre_exemplaires' => 'required|integer|min:1',
        'description' => 'required',
        'date_publication' => 'required|date|before_or_equal:date_modification',
        'date_creation' => 'required|date|before_or_equal:now',
        'date_modification' => 'required|date|after_or_equal:date_creation',
        'author_id' => 'required|exists:authors,id',
        'image' => 'nullable|image|mimes:jpg,png,gif|max:2048'
    ];
    public function openEditForm($bookId){
        $this->book = Book::find($bookId);
        $this->titre = $this->book->titre;
        $this->nombre_exemplaires = $this->book->nombre_exemplaires;
        $this->description = $this->book->description;
        $this->date_publication = $this->book->date_publication;
        $this->date_creation = $this->book->date_creation;
        $this->date_modification = $this->book->date_modification;
        $this->author_id = $this->book->author_id;
        $this->showForm = true;
    }
    public function closeEditForm(){
        $this->showForm = false;
    }

    public function save(){
        $this->validate();
        $filename = $this->image ? $this->image->store('books', 'public') : $this->book->image;
        $this->book->update([
            'titre' => $this->titre,
            'nombre_exemplaires' => $this->nombre_exemplaires,
            'description' => $this->description,
            'date_publication' => $this->date_publication,
            'date_creation' => $this->date_creation,
            'date_modification' => $this->date_modification,
            'author_id' => $this->author_id,
            'image' => $filename
        ]);
        $this->showForm = false;
        $this->dispatch('editBook');
        $this->successMessage = "Livre modifié avec succés";
    }
    public function render()
    {
        $authors = Author::select('id', 'nom', 'prenom')->get();

        return view('livewire.books.edit-book', compact('authors'));
    }
}
