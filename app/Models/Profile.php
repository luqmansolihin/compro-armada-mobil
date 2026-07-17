<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cover',
        'address',
        'short_description',
        'description',
        'vision',
        'mission',
        'history'
    ];

    protected $casts = [
        'history' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            if (auth()->check() && !$model->user_id) {
                $model->user_id = auth()->id();
            }
        });
    }

    public function getCoverAttribute($value)
    {
        if (!$value) {
            return null;
        }
        if (request()->is('admin*') || request()->is('livewire*') || app()->runningInConsole()) {
            return $value;
        }
        return filter_var($value, FILTER_VALIDATE_URL) ? $value : asset('storage/' . $value);
    }
}
