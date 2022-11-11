<?php

namespace App\Http\Livewire\Dashboard\Event;

use Livewire\Component;

class Event extends Component
{
    public function render()
    {
        return view('livewire.dashboard.event.event')
            ->extends('layouts.dashboard', ['title' => 'Event'])
            ->section('main-content');
    }
}
