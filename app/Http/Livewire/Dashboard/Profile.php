<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public $userId, $name, $email, $username, $userType;
    public $usernameDelete, $checkboxDeactive;

    protected $listeners = ['delete'];

    public function mount()
    {
        $user = User::find(auth()->user()->id);

        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->userType = $user->role->name;
    }

    public function updateUser($userId)
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
        ]);

        $user = User::find($userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        if ($user) {
            $this->dispatchBrowserEvent('swal:toast', [
                'type' => 'success',
                'title' => 'Profile updated!',
            ]);
        }
    }

    public function resetForm()
    {
        $user = User::find(auth()->user()->id);

        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function dactiveAccount($userId)
    {
        $this->validate([
            'usernameDelete' => 'in:' . auth()->user()->username,
            'checkboxDeactive' => 'required',
        ]);

        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => 'Account cannot be returned.',
            'id' => $userId,
        ]);
    }

    public function delete($userId)
    {
        $user = User::find($userId)->delete();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.dashboard.profile')
            ->extends('layouts.dashboard', [
                'title' => 'Profile',
            ])
            ->section('main-content');
    }
}
