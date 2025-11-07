<?php

namespace App\Livewire\Reservation;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MakeReservation extends Component
{
    public $showReservationForm = false;
    public $date_debut, $date_fin,$book;
    public $successMessage = null;
    public $errorMessage = null;

    public $rules = [
        'date_debut' => 'required|date|before_or_equal:date_fin',
        'date_fin' => 'required|date|after_or_equal:date_debut'
    ];
    protected $listeners = ['openReservationForm' => 'openForm'];
    public function openForm($bookId){
        $this->book = Book::find($bookId);
        $this->showReservationForm = true;
    }

    public function closeForm(){
        $this->showReservationForm = false;
    }

    public function save()
    {
        $this->validate();

        // Vérifie s’il y a une réservation active qui chevauche les dates
        $hasReservation = \App\Models\Reservation::where('book_id', $this->book->id)
            ->where('date_debut', '<', $this->date_fin)
            ->where('date_fin', '>', $this->date_debut)
            ->where('status', 'EN_COURS')
            ->exists();

        if ($this->book->nombre_exemplaires <= 0) {
            $this->errorMessage = "Aucun exemplaire disponible pour ce livre.";
            return;
        }

        if ($hasReservation) {
            $this->errorMessage = "Le livre est déjà réservé pour cette période.";
            return;
        }

        // Crée la réservation
        \App\Models\Reservation::create([
            'date_debut' => $this->date_debut,
            'date_fin' => $this->date_fin,
            'status' => 'EN_COURS',
            'book_id' => $this->book->id,
            'user_id' => Auth::user()->getAuthIdentifier(),
        ]);

        $this->book->decrement('nombre_exemplaires');

        $this->successMessage = "Le livre a été réservé avec succès.";
        $this->showReservationForm = false;
        $this->dispatch('reservationCreate');
    }

    public function render()
    {
        return view('livewire.reservation.make-reservation');
    }
}
