<?php

namespace App\Livewire\Reservation;

use App\Models\Book;
use Livewire\Component;

class Reservation extends Component
{
    public $search = '';
    public $perPage = 6;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reservationCreate' => '$refresh'];
    public function render()
    {
        $books = Book::join('authors', 'books.author_id','=', 'authors.id')
            ->select('books.*', 'authors.nom', 'authors.prenom')
            ->search($this->search)
            ->paginate($this->perPage);
        return view('livewire.reservation.reservation', compact('books'));
    }
}
