<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class HistoryPerSubscriberController extends Controller
{
    public function show($id)
    {
        $books = Reservation::join('books', 'books.id', '=', 'reservations.book_id')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->where('reservations.user_id', $id)
            ->select(
                'books.*',
                'authors.prenom',
                'authors.nom',
                'reservations.status',
                'reservations.id as reservation_id',
                'reservations.date_debut'
            )
            ->orderBy('reservations.date_debut', 'desc')
            ->paginate(5);

        return view('history.subscriber_history', compact('books'));
    }
}
