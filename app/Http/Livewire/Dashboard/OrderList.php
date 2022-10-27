<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\PengelolaOrder;
use App\Models\UserOrder;
use Livewire\Component;

class OrderList extends Component
{
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

    public function toDetail($orderId)
    {
        $this->emit('getOrderId', $orderId);
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
