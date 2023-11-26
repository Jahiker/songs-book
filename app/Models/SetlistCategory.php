<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SetlistCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get all de Setlists that belong to the setlist category.
     *
     * @return HasMany
     */
    public function setlists(): HasMany
    {
        return $this->hasMany(SetlistCategory::class);
    }
}
