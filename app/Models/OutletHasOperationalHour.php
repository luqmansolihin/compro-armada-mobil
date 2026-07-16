<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OutletHasOperationalHour extends Model
{
    use HasFactory;

    protected $table = 'outlet_has_operational_hours';

    protected $fillable = [
        'outlet_id',
        'day_from',
        'day_to',
        'open_time',
        'close_time'
    ];

    public function outlet(): BelongsTo
    {
        return $this->belongsTo(Outlet::class);
    }
}
