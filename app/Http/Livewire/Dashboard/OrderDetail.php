<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\UserOrder;
use Livewire\Component;
use Livewire\WithFileUploads;

class OrderDetail extends Component
{
    use WithFileUploads;

    public $order;
    public $image;

    public function mount($orderId)
    {
        $this->order = UserOrder::find($orderId);
    }

    public function uploadImage()
    {
        $this->validate([
            'image' => 'image|max:2048',
        ]);

        // $this->image->store('img-transfer');
    }

    public function render()
    {
        return view('livewire.dashboard.order-detail')
            ->extends('layouts.dashboard', ['title' => 'Detail'])
            ->section('main-content');
    }
}
