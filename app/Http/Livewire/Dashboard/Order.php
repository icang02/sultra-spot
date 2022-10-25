<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\TourPlace;
use Livewire\Component;

class Order extends Component
{
    public $wisataId, $name, $city, $address, $image,
        $qty, $price, $hrgSewaKamera, $total, $paymentTotal;
    public $rental;

    public function mount()
    {
        $this->wisataid = session('wisataId');
        $wisata = TourPlace::find($this->wisataid);

        $this->rental = $wisata->rental;

        $this->name = $wisata->name;
        $this->city = $wisata->city;
        $this->address = $wisata->address;
        $this->image = $wisata->image;
        $this->price = $wisata->price;

        if ($wisata->rental)
            $this->hrgSewaKamera = session('hrgSewaKamera');
        else
            $this->hrgSewaKamera = 0;

        $this->qty = session('qty');
        $this->total = $this->qty * $this->price;
        $this->paymentTotal = $this->total + $this->hrgSewaKamera;
    }

    public function render()
    {
        return view('livewire.dashboard.order')
            ->extends('layouts.dashboard', [
                'title' => 'Order',
            ])->section('main-content');
    }
}
