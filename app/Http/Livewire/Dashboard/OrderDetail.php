<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\PengelolaOrder;
use App\Models\UserOrder;
use Livewire\Component;
use Livewire\WithFileUploads;

class OrderDetail extends Component
{
    use WithFileUploads;

    protected $listeners = ['action'];
    public $order;
    public $image;

    public function mount($orderId)
    {
        $this->order = UserOrder::find($orderId);
    }

    public function action()
    {
        return redirect()->route('orderList');
    }

    public function uploadImage()
    {
        $this->validate([
            'image' => 'image|max:2048',
        ]);

        $imgUser2 = cloudinary()->upload($this->image->getRealPath(), [
            'folder' => 'transfer-user-2'
        ])->getSecurePath();
        UserOrder::find($this->order->id)->update([
            'image_tf' => $imgUser2,
            'image_tf_public_id' => cloudinary()->getPublicId($imgUser2),
        ]);

        $imgUser3 = cloudinary()->upload($this->image->getRealPath(), [
            'folder' => 'transfer-user-3'
        ])->getSecurePath();
        PengelolaOrder::find($this->order->id)->update([
            'image_tf' => $imgUser3,
            'image_tf_public_id' => cloudinary()->getPublicId($imgUser3),
        ]);

        if ($imgUser2 && $imgUser3) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Success!',
                'text' => 'Upload image successfully.',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.order-detail')
            ->extends('layouts.dashboard', ['title' => 'Detail'])
            ->section('main-content');
    }
}
