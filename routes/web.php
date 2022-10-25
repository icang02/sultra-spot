<?php

use App\Http\Livewire\Auth\ForgetPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard\Admin\User\Edit as UserEdit;
use App\Http\Livewire\Dashboard\Admin\User\Index as UserIndex;
use App\Http\Livewire\Dashboard\Index;
use App\Http\Livewire\Dashboard\Order;
use App\Http\Livewire\Dashboard\Profile;
use App\Http\Livewire\Dashboard\Wisata;
use App\Http\Livewire\Dashboard\WisataDetail;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('dashboard')->middleware('auth');
Route::get('dashboard', Index::class)->name('dashboard')->middleware('auth');

Route::get('profile', Profile::class)->name('profile')->middleware('auth');

Route::get('wisata', Wisata::class)->middleware('auth')->name('wisata');
Route::get('wisata/{id}', WisataDetail::class)->middleware('auth')->name('wisata.detail');
Route::get('wisata/order/{id}', Order::class)->middleware('auth')->name('wisata.detail');

Route::get('login', Login::class)->name('login')->middleware('guest');
Route::get('register', Register::class)->name('register')->middleware('guest');
Route::get('forget-password', ForgetPassword::class)->name('forget.password')->middleware('guest');

Route::get('{role:name}', UserIndex::class)->middleware('auth');
Route::get('{role:name}/{user:username}/edit', UserEdit::class)->middleware('auth');
