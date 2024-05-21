<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    // $table->enum('status', ['pending', 'in-progress', 'completed'])->default('pending');

    protected $fillable = [
        'user_id', 'title', 'description', 'status', 'total_price',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function delivery(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }

    public function isPaid(): bool
    {
        return $this->payment()->exists();
    }

    public function getStatusClass(): string
    {
        return match ($this->status) {
            'pending' => 'text-yellow-500',
            'in-progress' => 'text-blue-500',
            'completed' => 'text-green-500',
            default => 'text-gray-500',
        };
    }
}
