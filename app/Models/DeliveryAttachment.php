<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_id',
        'file_path',
        'file_name',
        'file_type',
    ];

    public function delivery(): BelongsTo
    {
        return $this->belongsTo(Delivery::class, 'delivery_id');
    }
}
