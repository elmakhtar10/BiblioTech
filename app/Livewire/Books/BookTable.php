<?php

namespace App\Livewire\Books;

use App\Models\Author;
use App\Models\Book;
use Livewire\Component;

class BookTable extends Component
{
    public $search = '';
    public $successMessage = null;
    public $errorMessage = null;

    public function delete(Book $book){
        $hasAuthors = Author::where('id', $book->author_id)->exists();
        if($hasAuthors){
            $this->errorMessage = "Impossible de supprimer ce livre car des auteurs lui sont encore associés.";
        }else{
            $book->delete();
            $this->successMessage = "Livre supprimé avec succès !";
        }
    }
    public function render()
    {
        $books = Book::join('authors', 'books.author_id','=', 'authors.id')
                        ->select('books.*', 'authors.nom', 'authors.prenom')
                        ->search($this->search)
                        ->paginate(5);

        return view('livewire.books.book-table', compact('books'));
    }
}
