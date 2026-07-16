<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\HasUniqueSlug;

class Blog extends Model
{
    use HasFactory, SoftDeletes, HasUniqueSlug;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'content',
        'status'
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

    public function getImageAttribute($value)
    {
        if (!$value) {
            return null;
        }
        if (request()->is('admin*') || request()->is('livewire*') || app()->runningInConsole()) {
            return $value;
        }
        return filter_var($value, FILTER_VALIDATE_URL) ? $value : asset('storage/' . $value);
    }

    public function getExcerptAttribute()
    {
        return \Illuminate\Support\Str::limit(strip_tags($this->content), 150);
    }
}
