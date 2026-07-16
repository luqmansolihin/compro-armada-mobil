<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUniqueSlug
{
    protected static function bootHasUniqueSlug()
    {
        static::saving(function ($model) {
            // Check if slug is set and dirty (or if it's a new record)
            if ($model->isDirty('slug') || !$model->exists) {
                // Determine source field: title or name
                $source = $model->slug ?: ($model->title ?: $model->name);
                $slug = Str::slug($source);
                if (empty($slug)) {
                    $slug = 'untitled';
                }
                
                $originalSlug = $slug;
                $count = 1;
                
                // Determine query context (handling SoftDeletes dynamically)
                $query = in_array(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses_recursive(static::class))
                    ? static::withTrashed()
                    : static::query();
                
                // Keep checking until we find a unique slug
                while ($query->clone()
                    ->where('slug', $slug)
                    ->where('id', '!=', $model->id) // Ignore current record on update
                    ->exists()) {
                    $slug = $originalSlug . '-' . ++$count;
                }
                
                $model->slug = $slug;
            }
        });
    }

    public static function generateUniqueSlug(?string $state, string $modelClass, $ignoreId = null): string
    {
        if (blank($state)) {
            return '';
        }
        
        $slug = Str::slug($state);
        $originalSlug = $slug;
        $count = 1;
        
        // Determine query context (handling SoftDeletes dynamically)
        $query = in_array(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses_recursive($modelClass))
            ? $modelClass::withTrashed()
            : $modelClass::query();
            
        // Keep checking until we find a unique slug
        while ($query->clone()
            ->where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $originalSlug . '-' . ++$count;
        }
        
        return $slug;
    }
}
