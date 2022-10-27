<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Cart;
use App\Models\TourPlace;
use Livewire\Component;

class WisataDetail extends Component
{
    public $wisata;
    public $qty, $chkboxSewaKamera, $hrgSewaKamera, $paymentTotal;

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

        $wisata = TourPlace::find($wisataId);
        $carts = Cart::all();

        if ($wisata->rental) {
            if ($this->chkboxSewaKamera == null || $this->chkboxSewaKamera == false) {
                $this->hrgSewaKamera = 0;
            } else {
                $this->hrgSewaKamera = 50000;
            }
        }
        $this->paymentTotal = ($this->qty * $wisata->price) + $this->hrgSewaKamera;

        if ($carts->count() === 0) {
            $cart = Cart::create([
                'user_id' => auth()->user()->id,
                'tour_place_id' => $wisata->id,
                'quantity' => $this->qty,
                'total_payment' => $this->paymentTotal,
                'price_kamera' => $this->hrgSewaKamera,
            ]);
            if ($cart) {
                $this->dispatchBrowserEvent('swal:toast', [
                    'type' => 'success',
                    'title' => 'Item added successfully!',
                ]);
                $this->emit('updateCartCount');
            }
        } else {
            $cart = $carts->where('tour_place_id', $wisataId)->first();
            if ($cart) {
                $cart->update([
                    'quantity' => $this->qty,
                    'total_payment' => $this->paymentTotal,
                    'price_kamera' => $this->hrgSewaKamera,
                ]);
                $this->emit('updateCartCount');

                return $this->dispatchBrowserEvent('swal:toast', [
                    'type' => 'success',
                    'title' => 'Item in cart updated!',
                ]);
            }

            $cart = Cart::create([
                'user_id' => auth()->user()->id,
                'tour_place_id' => $wisata->id,
                'quantity' => $this->qty,
                'total_payment' => $this->paymentTotal,
                'price_kamera' => $this->hrgSewaKamera,
            ]);
            if ($cart) {
                $this->dispatchBrowserEvent('swal:toast', [
                    'type' => 'success',
                    'title' => 'Item added successfully!',
                ]);
                $this->emit('updateCartCount');
            }
        }
    }

    public function render()
    {
        return view('livewire.dashboard.wisata-detail')
            ->extends('layouts.dashboard', ['title' => 'Wisata'])
            ->section('main-content');
    }
}
