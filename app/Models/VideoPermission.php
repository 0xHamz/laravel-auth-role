<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'video_id',
        'start_time',
        'end_time'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time'   => 'datetime',
    ];

    /* ================= RELATIONS ================= */

    // Izin milik user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Izin milik video
    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }

    /* ================= HELPER ================= */

    // Cek apakah izin masih aktif
    public function isActive(): bool
    {
        return now()->between($this->start_time, $this->end_time);
    }
}
