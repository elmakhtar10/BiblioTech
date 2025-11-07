<?php

namespace App\Livewire\Subscribers;

use App\Models\User;
use App\Models\Reservation;
use Livewire\Component;
use Livewire\WithPagination;

class SubscribersTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $successMessage = null;
    public $errorMessage = null;
    protected $listeners = ['updateSubscriber', '$refresh'];
    public function changeStatus($id){
        $subscriber = User::find($id);
        $subscriber->update([
            'status' => $subscriber->status === 'ACTIVE' ? 'INACTIVE' : 'ACTIVE'
        ]);
        $this->successMessage = "Le statut de l'abonné a été mis à jour";
        $this->render();
    }

    public function delete(User $user)
    {
        $hasReservation = Reservation::where('user_id', $user->id)->exists();
        if($hasReservation){
            $this->errorMessage = "Impossible de supprimer l'abonnee car il a des reservations en cours";
        }else{
            $user->delete();
            $this->successMessage = 'Abonnes supprimer avec success';
        }
    }

    public function render()
    {
        $subscribers = User::where('profile_id', 1)->paginate(5);
        return view('livewire.subscribers.subscribers-table', compact('subscribers'));
    }
}
