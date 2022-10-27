<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $cartCount;
    protected $listeners = ['updateCartCount' => 'mount'];

    public function mount()
    {
        $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
    }

    public function logout()
    {
        Auth::logout();
        redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.dashboard.components.navbar');
    }
}
