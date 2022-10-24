<?php

namespace App\Http\Livewire\Dashboard\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public function logout()
    {
        Auth::logout();

        redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.dashboard.components.navbar');
    }
}
