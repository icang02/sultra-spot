<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SweetAlert extends Component
{
    public $title;
    protected $listeners = ['delete'];

    public function storePost()
    {
        $this->validate(['title' => 'required']);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record added successfully',
            'text' => '',
        ]);

        $this->title = '';
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        // dd("Deleted id : $id");
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record deleted successfully',
            'text' => '',
        ]);
    }

    public function render()
    {
        return view('livewire.sweet-alert')
            ->extends('layouts.dashboard', ['title' => 'Alert'])
            ->section('main-content');
    }
}
