<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Song extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'content',
        'media',
        'song_category_id',
        'user_id',
    ];

    /**
     * Get the User that owns this Song.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the song category that owns this Song.
     *
     * @return BelongsTo
     */
    public function song_category(): BelongsTo
    {
        return $this->belongsTo(SongCategory::class);
    }

    /**
     * Get all the setlist that owns this Song.
     *
     * @return BelongsToMany
     */
    public function setlists(): BelongsToMany
    {
        return $this->belongsToMany(Setlist::class);
    }
}
