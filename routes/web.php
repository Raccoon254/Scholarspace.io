<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\EditProfile;
use App\Livewire\ManageUsers;
use App\Livewire\OrderCreate;
use App\Livewire\Dashboard;
use App\Livewire\Messages;
use App\Livewire\OrderPayment;
use App\Livewire\Orders;
use App\Livewire\OrderShow;
use App\Livewire\Referrals;
use App\Livewire\VerifyPayments;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\PagesController;

Route::get('/', [StaticPageController::class, 'welcome'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', EditProfile::class)->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/messages', Messages::class)->name('messages');
    Route::get('/orders', OrderShow::class)->name('orders.index');
    Route::get('/referrals', Referrals::class)->name('referrals');

    Route::get('/orders/create', OrderCreate::class)->name('orders.create');
    Route::get('/orders/pay/{orderId}', OrderPayment::class)->name('orders.pay');

    Route::get('/payments', VerifyPayments::class)->name('payments.index');
    Route::get('/users', ManageUsers::class)->name('users.index');
});

require __DIR__.'/auth.php';
