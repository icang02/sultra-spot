<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    public $userId, $name, $email, $username, $userType, $imgProfil;
    public $imgAvatars;
    public $usernameDelete, $checkboxDeactive;
    public $user;

    protected $listeners = ['delete'];

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);

        $this->userId = $this->user->id;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->username = $this->user->username;
        $this->userType = $this->user->role->name;
        $this->imgAvatars = $this->user->image_profil;
    }

    public function resetAvatars()
    {
        redirect('profile');
    }

    public function updateUser($userId)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email:dns',
        ];
        if ($this->user->image_profil == 'profil.png') {
            $rules['imgProfil'] = 'image|max:2048';
        }

        $this->validate($rules);

        if ($this->user->image_profil == 'profil.png') {
            $avatars = cloudinary()->upload($this->imgProfil->getRealPath(), [
                'folder' => 'avatars'
            ])->getSecurePath();
            $avatarsId = cloudinary()->getPublicId($avatars);
        } elseif (!$this->imgProfil) {
            $avatars = $this->user->image_profil;
            $avatarsId = $this->user->image_publid_id;
        } else {
            $avatars = cloudinary()->upload($this->imgProfil->getRealPath(), [
                'folder' => 'avatars'
            ])->getSecurePath();
            $avatarsId = cloudinary()->getPublicId($avatars);
        }

        $user = User::find($userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'image_profil' => $avatars,
            'image_public_id' => $avatarsId,
        ]);

        if ($user) {
            $this->dispatchBrowserEvent('swal:toast', [
                'type' => 'success',
                'title' => 'Profile updated!',
            ]);
            $this->emit('render');
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
