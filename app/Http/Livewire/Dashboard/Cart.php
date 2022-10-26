<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Cart as UserCart;
use Livewire\Component;

class Cart extends Component
{
    public function deleteInCart($cartId)
    {
        $cart = UserCart::find($cartId)->delete();
        if ($cart) {
            $this->dispatchBrowserEvent('swal:toast', [
                'type' => 'error',
                'title' => 'Item deleted!',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.cart', [
            'carts' => UserCart::where('user_id', auth()->user()->id)->orderBy('id')->paginate(10)
        ])->extends('layouts.dashboard', [
            'title' => 'Cart',
        ])->section('main-content');
    }
}
