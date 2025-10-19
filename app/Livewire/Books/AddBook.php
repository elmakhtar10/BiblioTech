<?php

namespace App\Livewire\Books;

use App\Models\Author;
use App\Models\Book;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddBook extends Component
{
    use WithFileUploads;
    public $showForm = false;
    public $titre,$nombre_exemplaires,$description,
            $date_publication,$date_creation,
            $date_modification,$author_id,$image;
    public $successMessage = null;
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
    public function openBookForm(){
        $this->reset(['titre', 'nombre_exemplaires','description','date_publication','date_creation',
        'date_modification','author_id','image']);
        $this->showForm = true;
    }

    public function closeBookForm(){
        $this->showForm = false;
    }

    public function save(){
        $this->validate();
        $existingBook = Book::where('titre', $this->titre)
                            ->where('author_id', $this->author_id)
                            ->first();
        if($existingBook){
            $this->addError('titre', 'Ce livre existe déjà pour cet auteur.');
            return;
        }
        $filename = $this->image ? $this->image->store('books', 'public') : null;
        Book::create([
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
        $this->dispatch('addBook');
        $this->successMessage = 'Livre cree avec succes.';

    }

    public function render()
    {
        $authors = Author::select('id', 'nom', 'prenom')->get();
        return view('livewire.books.add-book', compact('authors'));
    }
}
