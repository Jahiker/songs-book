<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get all de setlists that belong to this user.
     *
     * @return HasMany
     */
    public function setlists(): HasMany
    {
        return $this->hasMany(Setlist::class);
    }

    /**
     * Get all de setlist categories that belong to this user.
     *
     * @return HasMany
     */
    public function setlist_categories(): HasMany
    {
        return $this->hasMany(SetlistCategory::class);
    }

    /**
     * Get all de songs that belong to this user.
     *
     * @return HasMany
     */
    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }

    /**
     * Get all de song categories that belong to this user.
     *
     * @return HasMany
     */
    public function song_categories(): HasMany
    {
        return $this->hasMany(SongCategory::class);
    }
}
