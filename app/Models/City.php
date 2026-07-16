<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function careers(): BelongsToMany
    {
        return $this->belongsToMany(Career::class, 'career_placements');
    }
}
