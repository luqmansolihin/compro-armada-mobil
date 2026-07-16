<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Traits\HasUniqueSlug;

class Career extends Model
{
    use HasFactory, SoftDeletes, HasUniqueSlug;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'requirement',
        'registration_from',
        'registration_to',
        'minimal_age',
        'maximal_age',
        'status'
    ];

    protected $casts = [
        'registration_from' => 'date',
        'registration_to' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class, 'career_placements');
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            if (auth()->check() && !$model->user_id) {
                $model->user_id = auth()->id();
            }
        });
    }
}
