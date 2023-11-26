<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Setlist extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'description',
        'setlist_category_id'
    ];

    /**
     * Get de setlist category that owns the setlist
     *
     * @return BelongsTo
     */
    public function setlist_category(): BelongsTo
    {
        return $this->belongsTo(Setlist::class);
    }

    /**
     * Get user that owns the setlist
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the songs that owns the setlist
     *
     * @return BelongsToMany
     */
    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Songs::class);
    }
}
