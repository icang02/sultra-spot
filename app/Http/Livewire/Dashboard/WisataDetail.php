<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\TourPlace;
use Illuminate\Cache\RedisStore;
use Livewire\Component;

class WisataDetail extends Component
{
    public $wisata;
    public $qty, $chkboxSewaKamera, $hrgSewaKamera;

    public function mount($id)
    {
        $this->wisata = TourPlace::find($id);
    }

    public function rules()
    {
        return [
            'qty' => 'required|numeric|max:' . $this->wisata->ticket_stock,
        ];
    }

    public function submitToOrder($wisataId)
    {
        if ($this->qty == null) {
            $this->dispatchBrowserEvent('swal:toast', [
                'type' => 'error',
                'title' => 'Your input field is empty!',
            ]);
        } else if ($this->qty > $this->wisata->ticket_stock) {
            $this->dispatchBrowserEvent('swal:toast', [
                'type' => 'error',
                'title' => 'Not enough stock!',
            ]);
        }
        $this->validate();

        if ($this->chkboxSewaKamera == null || $this->chkboxSewaKamera == false) {
            $this->hrgSewaKamera = 0;
        } else {
            $this->hrgSewaKamera = 50000;
        }

        session()->put('wisataId', $wisataId);
        session()->put('qty', $this->qty);
        session()->put('hrgSewaKamera', $this->hrgSewaKamera);

        return redirect("wisata/order/$wisataId");
    }

    public function addToCart($wisataId)
    {
        if ($this->qty == null) {
            $this->dispatchBrowserEvent('swal:toast', [
                'type' => 'error',
                'title' => 'Your input field is empty!',
            ]);
        } else if ($this->qty > $this->wisata->ticket_stock) {
            $this->dispatchBrowserEvent('swal:toast', [
                'type' => 'error',
                'title' => 'Not enough stock!',
            ]);
        }
        $this->validate();

        return redirect('dashboard');
    }

    public function render()
    {
        return view('livewire.dashboard.wisata-detail')
            ->extends('layouts.dashboard', ['title' => 'Wisata'])
            ->section('main-content');
    }
}
