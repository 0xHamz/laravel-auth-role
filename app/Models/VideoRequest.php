<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'video_id',
        'status'
    ];

    /* ================= RELATIONS ================= */

    // Request milik user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Request milik video
    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }
}
