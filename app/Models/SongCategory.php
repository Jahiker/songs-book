<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SongCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'user_id'
    ];

    /**
     * Get all the songs that belong to this category.
     *
     * @return HasMany
     */
    public function category(): HasMany
    {
        return $this->hasMany(Song::class);
    }
}
