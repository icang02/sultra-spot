<?php

namespace App\Http\Livewire\Dashboard\Admin\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $role;

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function deleteUser($userId)
    {
        User::find($userId)->delete();
    }

    public function render()
    {
        return view('livewire.dashboard.admin.user.index', [
            'users' => User::where('role_id', $this->role->id)->orderBy('id')->paginate(10)
        ])->extends('layouts.dashboard', [
            'title' => 'User',
        ])->section('main-content');
    }
}
