<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'path'
    ];

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blogs::class);
    }
}
