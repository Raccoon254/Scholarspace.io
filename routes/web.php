<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Dashboard;
use App\Livewire\Messages;
use App\Livewire\Orders;
use App\Livewire\Referrals;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\PagesController;

Route::get('/', [StaticPageController::class, 'welcome'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/messages', Messages::class)->name('messages');
    Route::get('/orders', Orders::class)->name('orders');
    Route::get('/referrals', Referrals::class)->name('referrals');
});

require __DIR__.'/auth.php';
