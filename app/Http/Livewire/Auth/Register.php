<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation, $agree;

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min:6', 'confirmed'],
            'agree' => ['required'],
        ];
    }

    public function registerSend()
    {
        $this->validate();

        $user = User::create([
            'name' => Str::title($this->name),
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        Auth::login($user, true);

        return redirect()->route('dashboard')->with('success', 'Congratulation - your account has been active.');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->extends('layouts.auth',  ['title' => 'Register'])
            ->section('main-content');
    }
}
