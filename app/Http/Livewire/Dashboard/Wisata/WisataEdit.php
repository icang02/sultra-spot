<?php

namespace App\Http\Livewire\Dashboard\Wisata;

use App\Models\TourPlace;
use Livewire\Component;
use Livewire\WithFileUploads;

class WisataEdit extends Component
{
    use WithFileUploads;
    public $placeId;
    public $name;
    public $city;
    public $address;
    public $description;
    public $telp;
    public $price;
    public $ticket_stock;
    public $rental;
    public $image;
    public $imageId;
    public $maps;

    public function mount($id)
    {
        $wisata = TourPlace::find($id);
        $this->placeId = $id;
        $this->name = $wisata->name;
        $this->city = $wisata->city;
        $this->address = $wisata->address;
        $this->description = $wisata->description;
        $this->telp = $wisata->telp;
        $this->price = $wisata->price;
        $this->ticket_stock = $wisata->ticket_stock;
        $this->rental = $wisata->rental;
        $this->image = $wisata->image;
        $this->imageId = $wisata->image_id;
        $this->maps = $wisata->maps;
    }

    public function updateData()
    {
        $rules = [
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'description' => 'required',
            'telp' => 'required',
            'price' => 'required',
            'ticket_stock' => 'required',
            'rental' => 'required',
            'maps' => 'required',
        ];

        dd($this->imageId);
        if ($this->image != $image) $rules['image'] = 'image|max:2048';

        $this->validate($rules);

        if ($this->image != $image) {
            $image = cloudinary()->upload($this->image->getRealPath(), [
                'folder' => 'wisata'
            ])->getSecurePath();
            $imageId = cloudinary()->getPublicId($image);
        }

        TourPlace::find($this->placeId)->update([
            'name' => $this->name,
            'city' => $this->city,
            'address' => $this->address,
            'description' => $this->description,
            'telp' => $this->telp,
            'price' => $this->price,
            'ticket_stock' => $this->ticket_stock,
            'rental' => $this->rental,
            'image' => $image,
            'image_id' => $imageId,
            'maps' => $this->maps,
        ]);

        return redirect()->route('wisata')->with('success', 'Added data successfully.');

        // dd(
        //     $this->name,
        //     $this->city,
        //     $this->address,
        //     $this->telp,
        //     $this->price,
        //     $this->ticket_stock,
        //     $this->rental,
        //     $this->image,
        //     $this->maps,
        // );
    }

    public function resetForm()
    {
        $this->name = '';
        $this->city = '';
        $this->address = '';
        $this->description = '';
        $this->telp = '';
        $this->price = '';
        $this->ticket_stock = '';
        $this->rental = '';
        $this->image = '';
        $this->maps = '';
    }

    public function render()
    {
        return view('livewire.dashboard.wisata.wisata-edit')
            ->extends('layouts.dashboard', ['title' => 'edit'])
            ->section('main-content');
    }
}
