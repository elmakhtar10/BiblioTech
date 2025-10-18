<?php

namespace App\Livewire\Authors;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AuthorsTable extends Component
{
    use WithPagination;
    public $successMessage = null;
    public $errorMessage = null;
    protected $listeners = ['auteurCree' => '$refresh',
                            'updateAuthor' => '$refresh'];
    public $perPage = 5;
    public $search = '';
    public function delete(Author $author){
        $hasBooks = Book::where('author_id', $author->id)->exists();
        if($hasBooks){
            $this->errorMessage = "Impossible de supprimer cet auteur car des livres lui sont encore associés.";
        }else{
            $author->delete();
            $this->successMessage = "Auteur supprimé avec succès !";
        }

    }

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $authors = Author::search($this->search)->paginate($this->perPage);
        return view('livewire.authors.authors-table', compact('authors'));
    }




}
