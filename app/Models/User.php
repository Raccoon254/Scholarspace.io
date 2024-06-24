<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',// ['writer', 'client', 'admin']
        'phone',
        'location',
        'profile_photo',
        'password',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function allMessages(): HasMany
    {
        return $this->messages()->union($this->receivedMessages());
    }

    public function getLastMessageAttribute(): Message|HasMany|null
    {
        return $this->allMessages()->orderBy('created_at', 'desc')->first();
    }

    public function getHasUnreadMessagesAttribute(): bool
    {
        return $this->receivedMessages()->whereNull('read_at')->exists();
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(Referral::class, 'referrer_id');
    }

    public function activity(): HasMany
    {
        return $this->hasMany(UserActivity::class);
    }

    public function lastSeen(): Model | null
    {
        return $this->activity()->latest()->first();
    }

    public function getAvatarAttribute(): string
    {
        return 'https://api.dicebear.com/8.x/identicon/svg?seed=' . $this->name;
    }

    public function getProfilePhotoAttribute(): string
    {
        return isset($this->attributes['profile_photo']) && $this->attributes['profile_photo']
            ? Storage::url($this->attributes['profile_photo'])
            : $this->avatar;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
