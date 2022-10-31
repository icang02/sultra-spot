<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\PengelolaOrder;
use App\Models\TourPlace;
use App\Models\UserOrder;
use Livewire\Component;
use Livewire\WithFileUploads;

class OrderDetail extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'action', 'render',
        'orderSuccess' => 'orderSuccessHandler'
    ];
    public $order;
    public $image;

    public $snapToken;

    public function mount($orderId)
    {
        $this->order = UserOrder::find($orderId);

        if ($this->order->status == 'pending') {
            $order = $this->order;
            $amount = $order->total_payment;

            $item_details = [
                [
                    'id' => $order->no_order,
                    'price' => $order->tour_place->price,
                    'quantity' => $order->quantity,
                    'name' => $order->tour_place->name,
                ],
            ];

            $customerDetails = [
                'first_name' => auth()->user()->name,
                'last_name' => null,
                'email' => auth()->user()->email,
                'phone' => null,
                'address' => null,
                'city' => null,
                'postal_code' => null,
            ];

            $transactionDetails = [
                'order_id' => $order->no_order,
                'gross_amount' => $amount
            ];

            $payload = [
                'transaction_details' => $transactionDetails,
                'customer_details' => $customerDetails,
                'item_details' => $item_details,
            ];

            // dd($transactionDetails);

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

            $snapToken = \Midtrans\Snap::getSnapToken($payload);

            $this->snapToken = $snapToken;
        }
    }

    public function orderSuccessHandler()
    {
        $userOrder = UserOrder::find($this->order->id)->update(['status' => 'selesai']);
        $pengelolaOrder = PengelolaOrder::find($this->order->id)->update(['status' => 'selesai']);
        if ($userOrder && $pengelolaOrder) {
            TourPlace::find($this->order->tour_place_id)->update([
                'ticket_stock' => $this->order->tour_place->ticket_stock - $this->order->quantity,
            ]);

            redirect()->route('orderList');
        }
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
            $this->emit('render');
        }
    }

    // public function checkout()
    // {
    //     $order = $this->order;
    //     $amount = $order->total_payment;

    //     $customerDetails = [
    //         'first_name' => auth()->user()->name,
    //         'last_name' => auth()->user()->username,
    //         'email' => auth()->user()->email,
    //         'phone' => '-',
    //         'address' => '-',
    //         'city' => '-',
    //         'postal_code' => '-',
    //     ];

    //     $transactionDetails = [
    //         'order_id' => $order->no_order,
    //         'gross_amount' => $amount
    //     ];

    //     $payload = [
    //         'transaction_details' => $transactionDetails,
    //         'customer_details' => $customerDetails,
    //     ];

    //     // Set your Merchant Server Key
    //     \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
    //     // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    //     \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
    //     // Set sanitization on (default)
    //     \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
    //     // Set 3DS transaction for credit card to true
    //     \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

    //     $snapToken = \Midtrans\Snap::getSnapToken($payload);

    //     $this->snapToken = $snapToken;
    // }

    public function render()
    {
        return view('livewire.dashboard.order-detail')
            ->extends('layouts.dashboard', ['title' => 'Detail'])
            ->section('main-content');
    }
}
