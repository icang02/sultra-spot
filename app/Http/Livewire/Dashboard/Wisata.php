<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\TourPlace;
use Livewire\Component;

class Wisata extends Component
{
    public $allWisata;

    public function mount()
    {
        $role_id = auth()->user()->role_id;
        if ($role_id == 2) {
            $this->allWisata = TourPlace::all();
        } elseif ($role_id == 3) {
            $this->allWisata = TourPlace::all();
            // $this->allWisata = TourPlace::where('id', $userId)->get();
        }
    }

    public function render()
    {
        return view('livewire.dashboard.wisata')
            ->extends('layouts.dashboard', ['title' => 'Wisata'])
            ->section('main-content');
    }
}
