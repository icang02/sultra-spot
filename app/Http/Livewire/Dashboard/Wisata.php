<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\TourPlace;
use Livewire\Component;

class Wisata extends Component
{
    public $allWisata;

    public function mount()
    {
        $this->allWisata = TourPlace::all();
    }

    public function render()
    {
        return view('livewire.dashboard.wisata')
            ->extends('layouts.dashboard', ['title' => 'Wisata'])
            ->section('main-content');
    }
}
