<?php

namespace App\Livewire\Books;

use App\Models\Author;
use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookTable extends Component
{
    use WithPagination;
    public $search = '';
    public $successMessage = null;
    public $errorMessage = null;
    public $listeners = ['addBook'=>'$refresh',
                        'editBook' => '$refresh'];
    public function delete(Book $book){
        $hasAuthors = Author::where('id', $book->author_id)->exists();
        if($hasAuthors){
            $this->errorMessage = "Impossible de supprimer ce livre car des auteurs lui sont encore associés.";
        }else{
            $book->delete();
            $this->successMessage = "Livre supprimé avec succès !";
        }
    }
    protected $paginationTheme = 'bootstrap';
    public $perPage = 5;
    public function render()
    {
        $books = Book::join('authors', 'books.author_id','=', 'authors.id')
                        ->select('books.*', 'authors.nom', 'authors.prenom')
                        ->search($this->search)
                        ->paginate($this->perPage);

        return view('livewire.books.book-table', compact('books'));
    }
}
