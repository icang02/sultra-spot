<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class OrderDetail extends Component
{
    public $orderId;
    protected $listeners = ['getOrderId', '__construct']

    public function __construct(int $orderId)
    {
        $this->orderId = $orderId;
    }

    public function render()
    {
        return view('livewire.dashboard.order-detail')
            ->extends('layouts.dashboard', ['title' => 'Detail'])
            ->section('main-content');
    }
}
