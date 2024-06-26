<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'amount',
        'payment_method', //[paypal, cash_app, zelle]
        'status',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getStatusClass(): string
    {
        return match ($this->status) {
            'pending' => 'bg-gray-500',
            'completed' => 'text-green-500 bg-green-500',
            'failed' => 'text-red-500 bg-red-500',
            default => 'text-gray-500',
        };
    }

    public function getStatusDescription(): string
    {
        return match ($this->status) {
            'pending' => 'Payment pending verification.',
            'completed' => 'Payment has been verified.',
            'failed' => 'Payment has failed.',
            default => 'Payment status is unknown.',
        };
    }
}
