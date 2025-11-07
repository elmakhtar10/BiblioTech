<?php

namespace App\Livewire\Reservation;

use App\Models\Book;
use Livewire\Component;

class Statistiques extends Component
{
    public function render()
    {
        $books = Book:: select('a.prenom','a.nom', 'books.titre','books.description','books.image')
                        ->join('reservations as r', 'r.book_id', '=', 'books.id')
                        ->join('authors as a', 'a.id', '=', 'books.author_id')
                        ->selectRaw('COUNT(r.book_id) AS nombre_reservation')
                        ->groupBy('r.book_id')
                        ->orderBy('nombre_reservation', 'desc')
                        ->limit(5)
                        ->get();
        return view('livewire.reservation.statistiques', compact('books'));
    }
}
