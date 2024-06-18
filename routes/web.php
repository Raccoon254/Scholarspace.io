<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\AutoOrderCreate;
use App\Livewire\EditProfile;
use App\Livewire\ManageUsers;
use App\Livewire\OrderCreate;
use App\Livewire\Dashboard;
use App\Livewire\Messages;
use App\Livewire\OrderEdit;
use App\Livewire\OrderPayment;
use App\Livewire\Orders;
use App\Livewire\OrderShow;
use App\Livewire\Referrals;
use App\Livewire\VerifyOrderPayment;
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
    Route::get('/orders/{order}', [PagesController::class, 'show_order'])->name('orders.show');
    Route::get('/orders/create/new', OrderCreate::class)->name('orders.create');
    Route::get('/orders/pay/{orderId}', OrderPayment::class)->name('orders.pay');
    Route::get('/orders/{order}/edit', OrderEdit::class)->name('orders.edit');

    // TODO: Fix the referral function system
    //Route::get('/referrals', Referrals::class)->name('referrals');

    //Redirect referrals to coming soon page
    Route::view('/referrals', 'static.coming-soon')->name('referrals');

    Route::get('/payments', VerifyPayments::class)->name('payments.index');
    Route::get('/users', ManageUsers::class)->name('users.index');
    Route::get('/users/{user}', [ManageUsers::class, 'show'])->name('users.show');

    Route::get('/payments/{paymentId}', VerifyOrderPayment::class)->name('payments.show');
});

Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact', [PagesController::class, 'submit'])->name('contact.submit');
Route::get('/how-it-works', [PagesController::class, 'howItWorks'])->name('how-it-works');
Route::get('/services', [PagesController::class, 'services'])->name('services');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/faq', [PagesController::class, 'faq'])->name('faq');
Route::view('/coming-soon', 'static.coming-soon')->name('coming-soon');
Route::fallback([PagesController::class, 'notfound'])->where('catchall', '.*');
Route::get('/not-found', [PagesController::class, 'notfound'])->name('not-found');
Route::get('/info/price-calculator', [PagesController::class, 'info_price_calculator'])->name('info.price-calculator');
Route::view('/info/order/create', 'info.order.create')->name('info.order.create');
Route::view('/info/order/payment', 'info.order.payment')->name('info.order.payment');
Route::post('/newsletter/subscribe', [PagesController::class, 'subscribe'])->name('newsletter.subscribe');
require __DIR__.'/auth.php';
