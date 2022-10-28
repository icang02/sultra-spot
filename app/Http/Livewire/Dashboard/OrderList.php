<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\PengelolaOrder;
use App\Models\UserOrder;
use Livewire\Component;

class OrderList extends Component
{
    protected $listeners = ['action'];
    public $orderId;

    public function mount()
    {
        $this->getDataOrder();
    }

    public function getDataOrder()
    {
        if (auth()->user()->role_id == 2) {
            return UserOrder::where('user_id', auth()->user()->id)->paginate(10);
        } elseif (auth()->user()->role_id == 3) {
            return PengelolaOrder::where('user_id', auth()->user()->id)->paginate(10);
        }
    }

    public function confirmDelete($orderId)
    {
        $this->orderId = $orderId;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Cancel?',
            'text' => 'Your order will be cancelled.',
            'id' => $orderId,
        ]);
    }

    public function action()
    {
        $userOrder = UserOrder::find($this->orderId)->delete();
        $pengelolaOrder = PengelolaOrder::find($this->orderId)->delete();

        if ($userOrder && $pengelolaOrder) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'info',
                'title' => 'Success!',
                'text' => 'Your order has been cancelled.',
            ]);
            $this->emit('updateCartCount');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.order-list', [
            'orderList' => $this->getDataOrder(),
        ])->extends('layouts.dashboard', [
            'title' => 'Order'
        ])->section('main-content');
    }
}
