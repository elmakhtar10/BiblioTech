<?php

namespace App\Livewire\History;

use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refresh' => '$refresh'];
    public $perPage = 6;
    public $successMessage = null;
    public $search = '';
    public $perStatus = 'Tout';
    public function changeStatus($id){
        $reservation = Reservation::find($id);
        $reservation->update(['status' => 'ANNULEE']);
        $this->successMessage = "Reservation Annulee avec succes";
        $this->dispatch('refresh');
    }
    public function render()
    {
        Reservation::where('status', 'EN_COURS')
            ->whereDate('date_fin', '<', now())
            ->update(['status' => 'TERMINEE']);

        $query = Reservation::join('books', 'books.id','=', 'reservations.book_id')
                ->join('authors', 'authors.id', '=', 'books.author_id')
                ->select('books.*','authors.prenom', 'authors.nom', 'reservations.status', 'reservations.id as reservation_id','reservations.date_debut')
                ->search($this->search)
                ->orderBy('reservations.date_debut', 'desc');
        if($this->perStatus != 'Tout'){
            $query->where('reservations.status', $this->perStatus);
        }
        $books = $query->paginate($this->perPage);
        return view('livewire.history.history', compact('books'));
    }
}
