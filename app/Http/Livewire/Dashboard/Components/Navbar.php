<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Models\PengelolaOrder;
use App\Models\UserOrder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $orderCount;
    protected $listeners = ['updateCartCount' => 'mount'];

    public function mount()
    {
        if (auth()->user()->role_id == 2) {
            $this->orderCount = UserOrder::where('user_id', auth()->user()->id)
                ->where('status', '=', 'pending')
                ->count();
        } elseif (auth()->user()->role_id == 3) {
            $this->orderCount = PengelolaOrder::where('user_id', auth()->user()->id)->count();
        }
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
