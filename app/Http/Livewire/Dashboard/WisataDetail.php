<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\TourPlace;
use Livewire\Component;

class WisataDetail extends Component
{
    public $wisata;

    public function mount($id)
    {
        $this->wisata = TourPlace::find($id);
    }

    public function render()
    {
        return view('livewire.dashboard.wisata-detail')
            ->extends('layouts.dashboard', ['title' => 'Wisata'])
            ->section('main-content');
    }
}
