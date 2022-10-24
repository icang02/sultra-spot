<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public $userId, $name, $email, $username, $userType;

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

        return redirect()->route('profile')->with('success', 'Updated account profile success.');
    }

    public function resetForm()
    {
        $user = User::find(auth()->user()->id);

        $this->name = $user->name;
        $this->email = $user->email;
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
