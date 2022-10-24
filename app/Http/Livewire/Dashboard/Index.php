<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard.index')
            ->extends('layouts.dashboard', ['title' => 'Dashboard'])
            ->section('main-content');
    }
}
