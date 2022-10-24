<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password, $username;

    public function rules()
    {
        return [
            'email' => ['required'],
            'password' => ['required'],
        ];
    }

    public function authCheck()
    {
        $this->validate();

        $auth = Auth::attempt(['email' => $this->email, 'password' => $this->password]);

        if ($auth) {
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Your email or password is wrong.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->extends('layouts.auth', ['title' => 'Login'])
            ->section('main-content');
    }
}
