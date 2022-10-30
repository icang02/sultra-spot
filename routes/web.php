<?php

use App\Http\Controllers\ResetPassword;
use App\Http\Livewire\Auth\ForgetPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard\Admin\User\Edit as UserEdit;
use App\Http\Livewire\Dashboard\Admin\User\Index as UserIndex;
use App\Http\Livewire\Dashboard\Index;
use App\Http\Livewire\Dashboard\Order;
use App\Http\Livewire\Dashboard\OrderDetail;
use App\Http\Livewire\Dashboard\OrderList;
use App\Http\Livewire\Dashboard\Profile;
use App\Http\Livewire\Dashboard\Wisata;
use App\Http\Livewire\Dashboard\Wisata\WisataAdd;
use App\Http\Livewire\Dashboard\Wisata\WisataEdit;
use App\Http\Livewire\Dashboard\WisataDetail;
use App\Http\Livewire\Home\Index as HomeIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeIndex::class)->name('home')->middleware('guest');
Route::get('dashboard', Index::class)->name('dashboard')->middleware('auth');

Route::get('profile', Profile::class)->name('profile')->middleware('auth');

Route::get('wisata', Wisata::class)->middleware('auth')->name('wisata');
Route::get('wisata/{id}', WisataDetail::class)->middleware('auth')->name('wisata.detail')->can('pengunjung');
Route::get('wisata/order/{id}', Order::class)->middleware('auth')->can('pengunjung');

Route::get('wisata-add', WisataAdd::class)->middleware('auth')->name('wisata.add')->can('pengelola');
Route::get('wisata-edit/{id}', WisataEdit::class)->middleware('auth')->name('wisata.edit')->can('pengelola');

// Route::get('cart', Cart::class)->middleware('auth')->can('pengunjung')->name('cart');
// Route::get('cart/order', OrderCart::class)->middleware('auth')->name('cart.order');

Route::get('order', OrderList::class)->middleware('auth')->name('orderList');
Route::get('order/{orderId}', OrderDetail::class)->middleware('auth');

Route::get('login', Login::class)->name('login')->middleware('guest');
Route::get('register', Register::class)->name('register')->middleware('guest');

// Forgot Password
// Route::get('forgot-password', ForgetPassword::class)->name('password.request')->middleware('guest');
Route::get('forgot-password', [ResetPassword::class, 'index'])->name('password.request')->middleware('guest');
Route::post('forgot-password', [ResetPassword::class, 'sendLink']);

Route::get('/reset-password/{token}', [ResetPassword::class, 'showForm'])->name('password.reset')->middleware('guest');
Route::post('/reset-password', [ResetPassword::class, 'resetPassword'])->middleware('guest')->name('password.update');

Route::get('{role:name}', UserIndex::class)->middleware('auth')->can('admin');
Route::get('{role:name}/{user:username}/edit', UserEdit::class)->middleware('auth')->can('admin');
