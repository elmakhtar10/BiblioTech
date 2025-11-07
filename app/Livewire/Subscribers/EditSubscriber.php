<?php

namespace App\Livewire\Subscribers;

use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditSubscriber extends Component
{
    use WithFileUploads;
    public $showEditForm = false;
    protected $listeners = ['openForm' => 'openEditForm'];
    public $email,$prenom,$nom,$telephone,$adresse,$photo;
    public $subscriber;
    public $successMessage = null;
    public $rules = [
        'email' => 'required|email',
        'prenom' => 'required|string',
        'nom' => 'required|string',
        'telephone' => 'required|digits:9',
        'adresse' => 'required|string',
        'photo' => 'nullable|image|mimes:jpg,png,gif|max:2048'
    ];
    public function openEditForm($subscriberId){
        $this->subscriber = User::find($subscriberId);
        $this->email = $this->subscriber->email;
        $this->prenom = $this->subscriber->prenom;
        $this->nom = $this->subscriber->nom;
        $this->telephone = $this->subscriber->telephone;
        $this->adresse = $this->subscriber->adresse;

        $this->showEditForm = true;
    }
    public function closeEditForm()
    {
        $this->showEditForm = false;
    }

    public function updateSubscriber()
    {
        $this->validate();
        $filename = $this->photo ? $this->photo->store('users', 'public') : $this->photo;
        $this->subscriber->update([
            'email' => $this->email,
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'telephone' => $this->telephone,
            'adresse' => $this->adresse,
            'photo' => $filename
        ]);
        $this->showEditForm = false;
        $this->successMessage = "Abonné modifier avec succes";
        $this->dispatch('updateSubscriber');
    }
    public function render()
    {
        return view('livewire.subscribers.edit-subscriber');
    }
}
