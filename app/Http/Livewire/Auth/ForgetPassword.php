<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class ForgetPassword extends Component
{
    public function render()
    {
        return view('livewire.auth.forget-password')
            ->extends('layouts.auth',  ['title' => 'Forget Password'])
            ->section('main-content');
    }
}
