<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Models\Role;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        return view('livewire.dashboard.components.sidebar', [
            'roles' => Role::all(),
        ]);
    }
}
