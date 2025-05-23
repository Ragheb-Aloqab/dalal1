<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'userable_id',
        'userable_type',
        'city_id',
    ];

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
    public function userable(): MorphTo
    {
        return $this->morphTo();
    }

    // Scope to get Admin users
    public function scopeAdmins(Builder $query): Builder
    {
        return $query->where('userable_type', Admin::class);
    }

    // Scope to get Provider users
    public function scopeProviders(Builder $query): Builder
    {
        return $query->where('userable_type', Provider::class);
    }

    // Scope to get Client users
    public function scopeClients(Builder $query): Builder
    {
        return $query->where('userable_type', Client::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Advertisement::class, 'advertisement_user')
            ->withTimestamps(); // This will automatically manage created_at and updated_at
    }
    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'user1');
    }
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function views()
    {
        return $this->hasMany(View::class);
    }
    public function shares()
    {
        return $this->hasMany(Share::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function isAdmin(): bool
    {
        return $this->userable_type === Admin::class;
    }

    public function isProvider(): bool
    {
        return $this->userable_type === Provider::class;
    }

    public function isClient(): bool
    {
        return $this->userable_type === Client::class;
    }

    public function following()
    {
        return $this->belongsToMany(Provider::class, 'follows', 'user_id', 'provider_id');
    }
    public function toggleFollow(Provider $provider): void
    {
        if ($this->following()->where('provider_id', $provider->id)->exists()) {
            $this->following()->detach($provider->id);
        } else {
            $this->following()->attach($provider->id);
        }
    }
    public function sender()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
}
